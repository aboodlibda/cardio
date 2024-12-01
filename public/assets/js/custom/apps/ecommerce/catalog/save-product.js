"use strict";
var KTAppEcommerceSaveProduct = function () {
    // Initialize Repeater
    const initRepeater = () => {
        $("#kt_ecommerce_add_product_options").repeater({
            initEmpty: false,
            defaultValues: { "text-input": "foo" },
            show: function () {
                $(this).slideDown();
                initSelect2(); // Reinitialize Select2 for dynamic fields
            },
            hide: function (e) {
                $(this).slideUp(e);
            }
        });
    };

    // Initialize Select2
    const initSelect2 = () => {
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-product="product_option"]').forEach((e) => {
            if (!$(e).hasClass("select2-hidden-accessible")) {
                $(e).select2({ minimumResultsForSearch: -1 });
            }
        });
    };

    // Initialize Dropzone
    const initDropzone = () => {
        const uploadedFiles = [];
        const myDropzone = new Dropzone("#kt_ecommerce_add_product_media", {
            url: "/upload-image", // Update this to your server-side upload handler
            paramName: "images",
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (file, response) {
                uploadedFiles.push(response.filePath); // Adjust based on server response
            },
            removedfile: function (file) {
                file.previewElement.remove();
            }
        });
    };

    // Initialize Discount Slider
    const initDiscountSlider = () => {
        const slider = document.querySelector("#kt_ecommerce_add_product_discount_slider");
        const label = document.querySelector("#kt_ecommerce_add_product_discount_label");

        if (slider && label) {
            noUiSlider.create(slider, {
                start: [10], // Initial percentage value
                connect: true,
                range: { min: 1, max: 100 }
            });

            slider.noUiSlider.on("update", (values, handle) => {
                const value = Math.round(values[handle]);
                label.innerHTML = value; // Update the percentage label
            });
        }
    };

    // Handle Discount Options Toggle
    const handleDiscountOptions = () => {
        const discountOptions = document.querySelectorAll('input[name="discount_option"]');
        const percentageField = document.getElementById("kt_ecommerce_add_product_discount_percentage");
        const fixedPriceField = document.getElementById("kt_ecommerce_add_product_discount_fixed");

        discountOptions.forEach((option) => {
            option.addEventListener("change", (e) => {
                const value = e.target.value;

                // Toggle fields based on selected discount option
                if (value === "1") {
                    percentageField.classList.add("d-none");
                    fixedPriceField.classList.add("d-none");
                } else if (value === "2") {
                    percentageField.classList.remove("d-none");
                    fixedPriceField.classList.add("d-none");
                } else if (value === "3") {
                    percentageField.classList.add("d-none");
                    fixedPriceField.classList.remove("d-none");
                }
            });
        });
    };

    // Initialize Status Toggle
    const initStatusToggle = () => {
        const statusEl = document.getElementById("kt_ecommerce_add_product_status");
        const statusSelect = document.getElementById("kt_ecommerce_add_product_status_select");
        const bgClasses = ["bg-success", "bg-warning", "bg-danger", "bg-primary"];

        if (statusSelect) {
            $(statusSelect).on("change", (e) => {
                const value = e.target.value;
                statusEl.classList.remove(...bgClasses);
                if (value === "published") statusEl.classList.add("bg-success");
                else if (value === "scheduled") statusEl.classList.add("bg-warning");
                else if (value === "unpublished") statusEl.classList.add("bg-danger");
                else if (value === "draft") statusEl.classList.add("bg-primary");
            });
        }

        $("#kt_ecommerce_add_product_status_datepicker").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i" });
    };

    // Handle Form Submission
    const handleFormSubmit = () => {
        const form = document.getElementById("kt_ecommerce_add_product_form");
        const submitButton = document.getElementById("kt_ecommerce_add_product_submit");

        if (form && submitButton) {
            submitButton.addEventListener("click", function (event) {
                event.preventDefault();

                // Create FormData object
                let formData = new FormData(form);

                // Show loading indicator
                submitButton.setAttribute("data-kt-indicator", "on");
                submitButton.disabled = true;

                // AJAX request
                $.ajax({
                    url: form.getAttribute('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;

                        Swal.fire({
                            text: response.message,
                            icon: response.icon,
                            buttonsStyling: false,
                            confirmButtonText: response.confirmButtonText,
                            customClass: { confirmButton: "btn btn-primary" }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = response.redirectUrl || form.getAttribute("data-kt-redirect");
                            }
                        });
                    },
                    error: function (xhr) {
                        submitButton.removeAttribute("data-kt-indicator");
                        submitButton.disabled = false;

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;

                            // Clear previous error messages
                            $('.error-message').empty();

                            // Display errors under each input
                            $.each(errors, function (key, message) {
                                if (key.includes('.')) {
                                    const [field, subfield] = key.split('.');
                                    let input = form.querySelector(`[name="${field}[${subfield}]"]`);
                                    if (input) {
                                        $(input).after(`<div class="error-message" style="color: red;">${message[0]}</div>`);
                                    }
                                } else {
                                    let input = form.querySelector(`[name="${key}"]`);
                                    if (input) {
                                        $(input).after(`<div class="error-message" style="color: red;">${message[0]}</div>`);
                                    }
                                }
                            });

                            Swal.fire({
                                text: "Please correct the errors and try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        } else {
                            Swal.fire({
                                text: "An unexpected error occurred. Please try again.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    }
                });
            });
        }
    };

    return {
        init: function () {
            handleFormSubmit();
            initRepeater();
            initSelect2();
            initDropzone();
            initDiscountSlider();
            initStatusToggle();
            handleDiscountOptions();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveProduct.init();
});

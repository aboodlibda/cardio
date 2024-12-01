"use strict";
var KTAppEcommerceSaveCoupon = function () {
    const initRepeater = () => {
        $("#kt_ecommerce_add_coupon_conditions").repeater({
            initEmpty: false,
            defaultValues: { "text-input": "foo" },
            show: function () {
                $(this).slideDown();
                initSelect2();
            },
            hide: function (e) {
                $(this).slideUp(e);
            }
        });
    };

    const initSelect2 = () => {
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-coupon="condition_type"]').forEach((e) => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({ minimumResultsForSearch: -1 });
        });
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-coupon="condition_equals"]').forEach((e) => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({ minimumResultsForSearch: -1 });
        });
    };

    const handleStatusToggle = () => {
        const statusEl = document.getElementById("kt_ecommerce_add_coupon_status");
        const statusSelect = document.getElementById("kt_ecommerce_add_coupon_status_select");
        const bgClasses = ["bg-success", "bg-warning", "bg-danger"];

        $(statusSelect).on("change", (e) => {
            statusEl.classList.remove(...bgClasses);
            switch (e.target.value) {
                case "active":
                    statusEl.classList.add("bg-success");
                    break;
                case "scheduled":
                    statusEl.classList.add("bg-warning");
                    break;
                case "inactive":
                    statusEl.classList.add("bg-danger");
                    break;
            }
        });

        $("#kt_ecommerce_add_coupon_status_datepicker").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i" });
    };

    const handleFormSubmit = () => {
        const form = document.getElementById("kt_ecommerce_add_coupon_form");
        const submitButton = document.getElementById("kt_ecommerce_add_coupon_submit");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        submitButton.addEventListener("click", (event) => {
            event.preventDefault();

            // Disable the button and show loading indicator
            submitButton.setAttribute("data-kt-indicator", "on");
            submitButton.disabled = true;

            $.ajax({
                url: form.getAttribute('action'),
                method: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function (data) {
                    submitButton.removeAttribute("data-kt-indicator");
                    submitButton.disabled = false;

                    Swal.fire({
                        text: data.text,
                        icon: data.icon,
                        buttonsStyling: false,
                        confirmButtonText: data.confirmButtonText,
                        customClass: { confirmButton: "btn btn-primary" }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = form.getAttribute("data-kt-redirect");
                        }
                    });
                },
                error: function (xhr) {
                    submitButton.removeAttribute("data-kt-indicator");
                    submitButton.disabled = false;

                    if (xhr.status === 422) {
                        // Clear previous error messages
                        $(form).find('.error-message').remove();

                        // Display validation errors under each input field
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, error) {
                            const [field, subfield] = key.split('.');
                            let input = $(form).find(`[name="${field}[${subfield}]"]`);
                            if (input.length) {
                                input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                            } else {
                                input = $(form).find(`[name="${key}"]`);
                                if (input.length) {
                                    input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                }
                            }
                        });

                        Swal.fire({
                            text: "Please correct the highlighted errors and try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    } else {
                        Swal.fire({
                            text: "An error occurred. Please try again later.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn btn-primary" }
                        });
                    }
                }
            });
        });
    };

    return {
        init: function () {
            initRepeater();
            initSelect2();
            handleStatusToggle();
            handleFormSubmit();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCoupon.init();
});

"use strict";
var KTAppEcommerceSaveCategory = function () {
    let messages = {};

    const currentLanguage = document.documentElement.lang || "ar";
    function loadMessagesWithCache(lang) {
        const cachedMessages = localStorage.getItem(`messages_${lang}`);
        if (cachedMessages) {
            messages = JSON.parse(cachedMessages);
            return Promise.resolve();
        } else {
            return $.getJSON(`/assets/js/custom/apps/ecommerce/language/languages.json`, function (data) {
                messages = data[lang] || data["en"];
                localStorage.setItem(`messages_${lang}`, JSON.stringify(messages));
            });
        }
    }

    loadMessagesWithCache(currentLanguage).then(() => {
        console.log("Messages loaded:", messages);
    });


    // Initialize Select2
    const initSelect2 = () => {
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-category="cateogry_option"]').forEach((e) => {
            if (!$(e).hasClass("select2-hidden-accessible")) {
                $(e).select2({ minimumResultsForSearch: -1 });
            }
        });
    };

    // Initialize Status Toggle
    const initStatusToggle = () => {
        const statusEl = document.getElementById("kt_ecommerce_add_category_status");
        const statusSelect = document.getElementById("kt_ecommerce_category_status_select");
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

        $("#kt_ecommerce_add_category_status_datepicker").flatpickr({ enableTime: true, dateFormat: "Y-m-d H:i" });
    };

    // Handle Form Submission
    const handleFormSubmit = () => {
        const form = document.getElementById("kt_ecommerce_add_category_form");
        const submitButton = document.getElementById("kt_ecommerce_add_category_submit");

        if (form && submitButton) {
            submitButton.addEventListener("click", function (event) {
                event.preventDefault();
                // Create FormData object
                let formData = new FormData(form);

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
                            text: response.text,
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
                                text: messages.correctErrors,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: messages.confirmButtonText,
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        } else {
                            Swal.fire({
                                text: messages.genericError,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: messages.confirmButtonText,
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
            initSelect2();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCategory.init();
});




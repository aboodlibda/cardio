"use strict";

// Initialize the KTAppEcommerceSaveCategory function
var KTAppEcommerceSaveCategory = function () {

    // Initialize the repeater for category conditions
    const initRepeater = () => {
        $("#kt_ecommerce_add_category_conditions").repeater({
            initEmpty: !1,
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

    // Initialize Select2 elements
    const initSelect2 = () => {
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-category="condition_type"]').forEach((e) => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({ minimumResultsForSearch: -1 });
        });
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-category="condition_equals"]').forEach((e) => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({ minimumResultsForSearch: -1 });
        });
    };

    // Initialize the Quill editor for text inputs
    const initQuillEditor = () => {
        ["#kt_ecommerce_add_category_description", "#kt_ecommerce_add_category_meta_description"].forEach((e) => {
            let t = document.querySelector(e);
            t && new Quill(e, {
                modules: { toolbar: [[{ header: [1, 2, !1] }], ["bold", "italic", "underline"], ["image", "code-block"]] },
                placeholder: "Type your text here...",
                theme: "snow"
            });
        });
    };

    // Initialize Tagify for the meta keywords input
    const initTagify = () => {
        ["#kt_ecommerce_add_category_meta_keywords"].forEach((e) => {
            const t = document.querySelector(e);
            t && new Tagify(t);
        });
    };

    // Handle category status changes (active, scheduled, inactive)
    const handleCategoryStatusChange = () => {
        const e = document.getElementById("kt_ecommerce_add_category_status"),
            t = document.getElementById("kt_ecommerce_add_category_status_select"),
            o = ["bg-success", "bg-warning", "bg-danger"];
        $(t).on("change", function (t) {
            switch (t.target.value) {
                case "active":
                    e.classList.remove(...o);
                    e.classList.add("bg-success");
                    hideStatusDatePicker();
                    break;
                case "scheduled":
                    e.classList.remove(...o);
                    e.classList.add("bg-warning");
                    showStatusDatePicker();
                    break;
                case "inactive":
                    e.classList.remove(...o);
                    e.classList.add("bg-danger");
                    hideStatusDatePicker();
            }
        });
    };

    // Show the status date picker
    const showStatusDatePicker = () => {
        const a = document.getElementById("kt_ecommerce_add_category_status_datepicker");
        a.parentNode.classList.remove("d-none");
    };

    // Hide the status date picker
    const hideStatusDatePicker = () => {
        const a = document.getElementById("kt_ecommerce_add_category_status_datepicker");
        a.parentNode.classList.add("d-none");
    };

    // Initialize the status date picker using flatpickr
    const initStatusDatePicker = () => {
        $("#kt_ecommerce_add_category_status_datepicker").flatpickr({ enableTime: !0, dateFormat: "Y-m-d H:i" });
    };

    // Handle radio button method change
    const handleMethodChange = () => {
        const e = document.querySelectorAll('[name="method"][type="radio"]'),
            t = document.querySelector('[data-kt-ecommerce-catalog-add-category="auto-options"]');
        e.forEach((e) => {
            e.addEventListener("change", (e) => {
                "1" === e.target.value ? t.classList.remove("d-none") : t.classList.add("d-none");
            });
        });
    };

    // Initialize form validation and form submission
    const initFormValidationAndSubmit = () => {
        let e;
        const t = document.getElementById("kt_ecommerce_add_category_form"),
            o = document.getElementById("kt_ecommerce_add_category_submit");

        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize form validation
        e = FormValidation.formValidation(t, {
            fields: {
                category_name: {
                    validators: {
                        notEmpty: {
                            message: "Category name is required"
                        }
                    }
                }
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "",
                    eleValidClass: ""
                })
            }
        });

        // Handle form submission
        o.addEventListener("click", (a) => {
            a.preventDefault();

            e && e.validate().then((function (e) {
                if ("Valid" === e) {
                    // Disable the button and show loading indicator
                    o.setAttribute("data-kt-indicator", "on");
                    o.disabled = true;

                    // Send the AJAX request to the server
                    submitFormData(t, o);
                } else {
                    showErrorMessage("Sorry, looks like there are some errors detected, please try again.");
                }
            }));
        });
    };

    const currentLanguage = document.documentElement.lang || "ar";
                                        // Display validation errors under each input field
                                        let errors = xhr.responseJSON.errors;
                                        $.each(errors, function (key, error) {
                                            const [field, subfield] = key.split('.');
                                            let input = $(t).find(`[name="${field}[${subfield}]"]`);
                                            if (input.length) {
                                                input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                            }else {
                                                // Handle inputs with simple names, such as "price"
                                                let input = $(t).find(`[name="${key}"]`);
                                                if (input.length) {
                                                    input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                                }
                                            }
                                        });
    // رسائل الأخطاء متعددة اللغات
    const messages = {
        en: {
            required: "This field is required.",
            correctErrors: "Please correct the highlighted errors and try again.",
            genericError: "An error occurred. Please try again later.",
            validated: "Validated successfully!",
            confirmButtonText: "Ok, got it!",

        },
        ar: {
            required: "هذا الحقل مطلوب.",
            correctErrors: "يرجى تصحيح الأخطاء المشار إليها ثم المحاولة مرة أخرى.",
            genericError: "حدث خطأ. يرجى المحاولة لاحقًا.",
            validated: "تم التحقق بنجاح!",
            confirmButtonText:"حسناً،فهمت"
        }
    };

    // Submit form data via AJAX
    const submitFormData = (form, submitButton) => {
        $.ajax({
            url: form.getAttribute('action'),
            method: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function (data) {
                if (data) {
                    Swal.fire({
                        text: data.text,
                        icon: data.icon,
                        buttonsStyling: !1,
                        confirmButtonText: data.confirmButtonText,
                        customClass: { confirmButton: "btn btn-primary" }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            submitButton.disabled = false;
                            window.location = form.getAttribute("data-kt-redirect");
                        }
                    });
                }
            },
            error: function (xhr) {
                submitButton.removeAttribute("data-kt-indicator");
                submitButton.disabled = false;

                handleError(xhr, form);
            }
        });
    };

    // Handle errors during form submission
    const handleError = (xhr, form) => {
        if (xhr.status === 422) {
            displayValidationErrors(xhr.responseJSON.errors, form);
            showErrorMessage(messages[currentLanguage].correctErrors);
        } else {
            showErrorMessage(messages[currentLanguage].genericError);
        }
    };

    // Display validation errors
    const displayValidationErrors = (errors, form) => {
        $(form).find('.error-message').remove();
        $.each(errors, function (key, error) {
            const [field, subfield] = key.split('.');
            let input = $(form).find(`[name="${field}[${subfield}]"]`);
            if (input.length) {
                input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
            } else {
                let input = $(form).find(`[name="${key}"]`);
                if (input.length) {
                    input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                }
            }
        });
    };

    const showErrorMessage = (message) => {
        Swal.fire({
            text: message,
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: messages[currentLanguage].confirmButtonText,
            customClass: { confirmButton: "btn btn-primary" }
        });
    };

    // Initialize all components
    const init = () => {
        initQuillEditor();
        initTagify();
        initRepeater();
        initSelect2();
        handleCategoryStatusChange();
        initStatusDatePicker();
        handleMethodChange();
        initFormValidationAndSubmit();
    };

    // Return the public init function
    return {
        init: init
    };
}();

// Initialize the KTAppEcommerceSaveCategory when the DOM is fully loaded
KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceSaveCategory.init();
});

"use strict";

var KTAppEcommerceSaveAttribute = function () {
    return {
        init: function () {
            (() => {
                const form = document.getElementById("kt_ecommerce_add_attribute_form");
                const submitButton = document.getElementById("kt_ecommerce_add_attribute_submit");

                if (!form || !submitButton) {
                    console.warn("Form or submit button not found.");
                    return;
                }

                // اللغة الحالية (تبديل بين "ar" و "en")
                const currentLanguage = document.documentElement.lang || "ar";

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

                // Set up CSRF token for AJAX requests
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });

                const validator = FormValidation.formValidation(form, {
                    fields: {
                        category_name: {
                            validators: {
                                notEmpty: {
                                    message: messages[currentLanguage].required
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

                submitButton.addEventListener("click", (event) => {
                    event.preventDefault();

                    validator.validate().then((status) => {
                        if (status === "Valid") {
                            // Disable the button and show loading indicator
                            submitButton.setAttribute("data-kt-indicator", "on");
                            submitButton.disabled = true;

                            // Send the AJAX request to the server
                            $.ajax({
                                url: form.getAttribute("action"),
                                method: "POST",
                                data: new FormData(form),
                                processData: false,
                                contentType: false,
                                success: (data) => {
                                    Swal.fire({
                                        text: data.text,
                                        icon: data.icon,
                                        buttonsStyling: false,
                                        confirmButtonText: data.confirmButtonText,
                                        customClass: { confirmButton: "btn btn-primary" }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            submitButton.disabled = false;
                                            if (form.getAttribute("data-kt-redirect")) {
                                                window.location = form.getAttribute("data-kt-redirect");
                                            }
                                        }
                                    });
                                },
                                error: (xhr) => {
                                    submitButton.removeAttribute("data-kt-indicator");
                                    submitButton.disabled = false;

                                    if (xhr.status === 422) {
                                        // Display validation errors
                                        const errors = xhr.responseJSON.errors;
                                        $(".error-message").text(""); // Clear previous errors
                                        for (const [key, messagesArray] of Object.entries(errors)) {
                                            const errorElement = document.getElementById(`${key.replace('.', '-')}-error`);
                                            if (errorElement) {
                                                errorElement.style.color = "red";
                                                errorElement.textContent = messagesArray[0]; // Display the first error message
                                            }
                                        }

                                        Swal.fire({
                                            text: messages[currentLanguage].correctErrors,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: messages[currentLanguage].confirmButtonText,
                                            customClass: { confirmButton: "btn btn-primary" }
                                        });
                                    } else {
                                        Swal.fire({
                                            text: messages[currentLanguage].genericError,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: messages[currentLanguage].confirmButtonText,
                                            customClass: { confirmButton: "btn btn-primary" }
                                        });
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                text: messages[currentLanguage].correctErrors,
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: messages[currentLanguage].confirmButtonText,
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                });
            })();
        }
    };
}();

KTUtil.onDOMContentLoaded(() => {
    KTAppEcommerceSaveAttribute.init();
});

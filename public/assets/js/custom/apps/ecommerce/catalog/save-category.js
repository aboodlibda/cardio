"use strict";
var KTAppEcommerceSaveCategory = function () {
    const e = () => {
        $("#kt_ecommerce_add_category_conditions").repeater({
            initEmpty: !1,
            defaultValues: {"text-input": "foo"},
            show: function () {
                $(this).slideDown(), t()
            },
            hide: function (e) {
                $(this).slideUp(e)
            }
        });
    };

    const t = () => {
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-category="condition_type"]').forEach((e => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({minimumResultsForSearch: -1});
        }));
        document.querySelectorAll('[data-kt-ecommerce-catalog-add-category="condition_equals"]').forEach((e => {
            $(e).hasClass("select2-hidden-accessible") || $(e).select2({minimumResultsForSearch: -1});
        }));
    };

    return {
        init: function () {
            ["#kt_ecommerce_add_category_description", "#kt_ecommerce_add_category_meta_description"].forEach((e => {
                let t = document.querySelector(e);
                t && (t = new Quill(e, {
                    modules: {toolbar: [[{header: [1, 2, !1]}], ["bold", "italic", "underline"], ["image", "code-block"]]},
                    placeholder: "Type your text here...",
                    theme: "snow"
                }));
            }));

            ["#kt_ecommerce_add_category_meta_keywords"].forEach((e => {
                const t = document.querySelector(e);
                t && new Tagify(t);
            }));

            e();
            t();

            (() => {
                const e = document.getElementById("kt_ecommerce_add_category_status"),
                    t = document.getElementById("kt_ecommerce_add_category_status_select"),
                    o = ["bg-success", "bg-warning", "bg-danger"];
                $(t).on("change", (function (t) {
                    switch (t.target.value) {
                        case "active":
                            e.classList.remove(...o), e.classList.add("bg-success"), r();
                            break;
                        case "scheduled":
                            e.classList.remove(...o), e.classList.add("bg-warning"), c();
                            break;
                        case "inactive":
                            e.classList.remove(...o), e.classList.add("bg-danger"), r();
                    }
                }));

                const a = document.getElementById("kt_ecommerce_add_category_status_datepicker");
                $("#kt_ecommerce_add_category_status_datepicker").flatpickr({enableTime: !0, dateFormat: "Y-m-d H:i"});
                const c = () => {
                    a.parentNode.classList.remove("d-none");
                }, r = () => {
                    a.parentNode.classList.add("d-none");
                };
            })();

            (() => {
                const e = document.querySelectorAll('[name="method"][type="radio"]'),
                    t = document.querySelector('[data-kt-ecommerce-catalog-add-category="auto-options"]');
                e.forEach((e => {
                    e.addEventListener("change", (e => {
                        "1" === e.target.value ? t.classList.remove("d-none") : t.classList.add("d-none");
                    }));
                }));
            })();

            (() => {
                let e;
                const t = document.getElementById("kt_ecommerce_add_category_form"),
                    o = document.getElementById("kt_ecommerce_add_category_submit");

                // Set up CSRF token for AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

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
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });

                o.addEventListener("click", (a => {
                    a.preventDefault();

                    e && e.validate().then((function (e) {
                        console.log("validated!");
                        if ("Valid" === e) {
                            // Disable the button and show loading indicator
                            o.setAttribute("data-kt-indicator", "on");
                            o.disabled = true;

                            // Send the AJAX request to the server
                            $.ajax({
                                url: t.getAttribute('action'),
                                method: 'POST',
                                data: new FormData(t),
                                processData: false,
                                contentType: false,
                                success: function (data) {
                                    if (data) {
                                        Swal.fire({
                                            text: data.text,
                                            icon: data.icon,
                                            buttonsStyling: !1,
                                            confirmButtonText: data.confirmButtonText,
                                            customClass: {confirmButton: "btn btn-primary"}
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                o.disabled = false;
                                                window.location = t.getAttribute("data-kt-redirect");
                                            }
                                        });
                                    }
                                },
                                error: function (xhr) {
                                    o.removeAttribute("data-kt-indicator");
                                    o.disabled = false;

                                    if (xhr.status === 422) {
                                        // Clear previous error messages
                                        $(t).find('.error-message').remove();

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

                                        Swal.fire({
                                            text: "Please correct the highlighted errors and try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {confirmButton: "btn btn-primary"}
                                        });
                                    } else {
                                        Swal.fire({
                                            text: "An error occurred. Please try again later.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {confirmButton: "btn btn-primary"}
                                        });
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {confirmButton: "btn btn-primary"}
                            });
                        }
                    }));
                }));
            })();
        }
    };
}();

KTUtil.onDOMContentLoaded((function () {
    KTAppEcommerceSaveCategory.init();
}));

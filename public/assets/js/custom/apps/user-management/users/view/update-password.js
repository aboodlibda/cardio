"use strict";
var user_id = $('meta[name="user_id"]').attr('content');
var root = window.location.protocol + '//' + window.location.host;

var lang = $('html').attr('lang'); // Get language from HTML lang attributes (e.g., "ar")
var URL = root + '/' + lang + '/cms/update-password/' + user_id;

var KTUsersUpdatePassword = function () {
    const t = document.getElementById("kt_modal_update_password"),
        e = t.querySelector("#kt_modal_update_password_form"),
        n = new bootstrap.Modal(t);

    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        current_password: { validators: { notEmpty: { message: "Current password is required" }}},
                        new_password: {
                            validators: {
                                notEmpty: { message: "The password is required" },
                                callback: {
                                    message: "Please enter a valid password",
                                    callback: function (t) {
                                        if (t.value.length > 0) return validatePassword();
                                    }
                                }
                            }
                        },
                        confirm_password: {
                            validators: {
                                notEmpty: { message: "The password confirmation is required" },
                                identical: {
                                    compare: function () {
                                        return e.querySelector('[name="password"]').value;
                                    },
                                    message: "The password and its confirm are not the same"
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

                // Close and Cancel button handlers
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" }
                    }).then((result) => {
                        if (result.value) {
                            e.reset();
                            n.hide();
                        }
                    });
                });

                t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (event) => {
                    event.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" }
                    }).then((result) => {
                        if (result.value) {
                            e.reset();
                            n.hide();
                        }
                    });
                });

                // Submit button handler
                const a = t.querySelector('[data-kt-users-modal-action="submit"]');
                a.addEventListener("click", (event) => {
                    event.preventDefault();
                    o && o.validate().then((result) => {
                        if (result === "Valid") {
                            a.setAttribute("data-kt-indicator", "on");
                            a.disabled = true;

                            // Perform AJAX request for form submission
                            $.ajax({
                                url: URL, // Replace with the correct route
                                method: 'PUT',
                                data: $(e).serialize(),
                                success: function(data) {
                                    a.removeAttribute("data-kt-indicator");
                                    a.disabled = false;

                                    Swal.fire({
                                        text: data.text,
                                        icon: data.icon,
                                        buttonsStyling: false,
                                        confirmButtonText: data.confirmButtonText,
                                        customClass: { confirmButton: "btn btn-primary" }
                                    }).then((function (result) {
                                        if (result.isConfirmed) {
                                            n.hide(); // Hide the modal
                                            location.reload(); // Refresh the page or data if needed
                                        }
                                    }));
                                },
                                error: function(xhr) {
                                    a.removeAttribute("data-kt-indicator");
                                    a.disabled = false;

                                    if (xhr.status === 422) {
                                        let errors = xhr.responseJSON.errors;
                                        $('.error-message').empty(); // Clear previous error messages

                                        // Display validation errors under each input
                                        $.each(errors, function(key, error) {
                                            $('#' + key + '-error').html('<p style="color:red;">' + error[0] + '</p>');
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
                                            text: "An unexpected error occurred. Please try again later.",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-primary" }
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            })();
        }
    };
}();
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePassword.init();
});

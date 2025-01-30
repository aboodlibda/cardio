"use strict";
var user_id = $('meta[name="user_id"]').attr('content');
var root = window.location.protocol + '//' + window.location.host;

var lang = $('html').attr('lang'); // Get language from HTML lang attributes (e.g., "ar")
var URL2 = root + '/' + lang + '/cms/update-role/' + user_id;
var KTUsersUpdateRole = function () {
    const t = document.getElementById("kt_modal_update_role"),
        e = t.querySelector("#kt_modal_update_role_form"),
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
                // Close button logic
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (event => {
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
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                }));

                // Cancel button logic
                t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (event => {
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
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                }));

                // Submit button logic
                const o = t.querySelector('[data-kt-users-modal-action="submit"]');
                o.addEventListener("click", function (event) {
                    event.preventDefault();

                    // Show loading indicator on the submit button
                    o.setAttribute("data-kt-indicator", "on");
                    o.disabled = true;

                    // Perform AJAX request for form submission
                    $.ajax({
                        url: URL2, // Replace with your actual route
                        method: 'POST',
                        data: $(e).serialize(), // Serialize form data
                        success: function (data) {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            if (data) {
                                Swal.fire({
                                    text: data.text,
                                    icon: data.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: data.confirmButtonText,
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        n.hide();
                                        location.reload(); // Refresh the page or perform other actions here if needed.
                                    }
                                });
                            }
                        },
                        error: function (xhr) {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $('#error-messages').empty(); // Clear previous error messages

                                // Display validation errors
                                $.each(errors, function (key, error) {
                                    $('#error-messages').append('<p style="color:red;">' + error[0] + '</p>');
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
                });
            })();
        }
    };
}();
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateRole.init();
});

"use strict";
var root = window.location.protocol + '//' + window.location.host;

var lang = $('html').attr('lang'); // Get language from HTML lang attribute (e.g., "ar")
var URL3 = window.location.protocol + '//' + window.location.host + '/' + lang + '/cms/users/';

var KTUsersAddUser = function () {
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);

    return {
        init: function () {
            (() => {
                const i = t.querySelector('[data-kt-users-modal-action="submit"]');

                i.addEventListener("click", (event) => {
                    event.preventDefault();

                    // Clear previous error messages
                    $(e).find('.error-message').remove();

                    // Show loading indicator
                    i.setAttribute("data-kt-indicator", "on");
                    i.disabled = true;

                    let formData = new FormData(e);

                    // Prepare AJAX request
                    $.ajax({
                        url: URL3, // Replace with your actual route
                        method: 'POST',
                        data: formData,
                        contentType: false, // Prevent jQuery from setting the content type header
                        processData: false, // Prevent jQuery from processing the data
                        success: function (data) {
                            // Hide loading indicator
                            i.removeAttribute("data-kt-indicator");
                            i.disabled = false;

                            // Show success message
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
                        error: function (xhr) {
                            // Hide loading indicator
                            i.removeAttribute("data-kt-indicator");
                            i.disabled = false;

                            // Handle validation errors from the server
                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function (key, error) {
                                    // Find the input field associated with the error and add the error message
                                    let inputElement = $(e).find(`[name="${key}"]`);
                                    if (inputElement.length) {
                                        inputElement.after('<span class="error-message" style="color:red;">' + error[0] + '</span>');
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
                                // Handle other errors
                                Swal.fire({
                                    text: "An error occurred. Please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            }
                        }
                    });
                });

                // Cancel and close button handlers
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
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    });
                });

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
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "Your form has not been cancelled!.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
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
    KTUsersAddUser.init();
});

"use strict";
var user_id = $('meta[name="user_id"]').attr('content');
var root = window.location.protocol + '//' + window.location.host;

var GET_USERS_URL = root + '/cms/users/' +user_id;

// alert("url: " + GET_USERS_URL);
var KTUsersUpdateDetails = function () {
    const t = document.getElementById("kt_modal_update_details"),
        e = t.querySelector("#kt_modal_update_user_form"),
        n = new bootstrap.Modal(t);

    return {
        init: function () {
            (() => {
                // Close button event listener
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t => {
                    t.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" }
                    }).then((function (t) {
                        if (t.value) {
                            e.reset();
                            n.hide();
                        } else if ("cancel" === t.dismiss) {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    }));
                }));

                // Cancel button event listener
                t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t => {
                    t.preventDefault();
                    Swal.fire({
                        text: "Are you sure you would like to cancel?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, cancel it!",
                        cancelButtonText: "No, return",
                        customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" }
                    }).then((function (t) {
                        if (t.value) {
                            e.reset();
                            n.hide();
                        } else if ("cancel" === t.dismiss) {
                            Swal.fire({
                                text: "Your form has not been cancelled!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" }
                            });
                        }
                    }));
                }));

                // Submit button event listener
                const o = t.querySelector('[data-kt-users-modal-action="submit"]');
                o.addEventListener("click", function (t) {
                    t.preventDefault();

                    // Show loading indicator on the button
                    o.setAttribute("data-kt-indicator", "on");
                    o.disabled = true;

                    // Perform AJAX request for form submission
                    $.ajax({
                        url: GET_USERS_URL, // Replace with your actual route
                        method: 'PUT',
                        data: $(e).serialize(), // Serialize form data
                        success: function (data) {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            if (data) {
                                Swal.fire({
                                    text: data.text,
                                    icon: data.icon,
                                    buttonsStyling: !1,
                                    confirmButtonText: data.confirmButtonText,
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then((function (t) {
                                    if (t.isConfirmed) {
                                        n.hide();
                                        location.reload();
                                        // Optional: Refresh data or perform other actions here
                                    }
                                }));
                            }
                        },
                        error: function (xhr) {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                $('.error-message').empty(); // Clear previous error messages

                                // Display validation errors
                                $.each(errors, function (key, error) {
                                    $('#' + key + '-error').html('<p style="color:red;">' + error[0] + '</p>');
                                });

                                Swal.fire({
                                    text: "Please correct the errors and try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                });
                            } else {
                                Swal.fire({
                                    text: "An unexpected error occurred. Please try again later.",
                                    icon: "error",
                                    buttonsStyling: !1,
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
    KTUsersUpdateDetails.init();
});

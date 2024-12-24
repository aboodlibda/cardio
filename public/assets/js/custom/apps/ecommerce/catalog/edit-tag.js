"use strict";
var KTUsersEditTag = function () {

    // Function to initialize each tag modal individually
    const initTagModals = () => {
        // Iterate over all modal trigger buttons
        document.querySelectorAll('[data-bs-target^="#kt_modal_edit_tag"]').forEach((modalTrigger) => {
            // Get the modal id from the button's data-bs-target attributes
            const modalId = modalTrigger.getAttribute('data-bs-target');
            // Select the modal element
            const modalElement = document.querySelector(modalId);

            // Check if the modal element exists
            if (modalElement) {
                const form = modalElement.querySelector("form");
                const submitButton = modalElement.querySelector("button[type='submit']");
                const cancelButton = modalElement.querySelector('[data-kt-tags-modal-action="cancel"]');
                const closeButton = modalElement.querySelector('[data-kt-tags-modal-action="close"]');
                const modal = new bootstrap.Modal(modalElement);

                // Add submit event listener to submit button
                submitButton.addEventListener("click", function (e) {
                    e.preventDefault();  // Prevent default form submission

                    const formData = new FormData(form);

                    // Show loading indicator
                    submitButton.setAttribute("data-kt-indicator", "on");
                    submitButton.disabled = true;

                    // AJAX request to submit the form data
                    $.ajax({
                        url: form.getAttribute("action"),
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // Re-enable the submit button
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;

                            Swal.fire({
                                title: response.title,
                                text: response.text,
                                icon: response.icon,
                                confirmButtonText: response.confirmButtonText
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redirect to specified URL or reload the page
                                    window.location.href = form.getAttribute("data-kt-redirect");
                                }
                            });
                        },
                        error: function (xhr) {
                            // Re-enable the submit button
                            submitButton.removeAttribute("data-kt-indicator");
                            submitButton.disabled = false;

                            if (xhr.status === 422) {
                                // Clear previous error messages
                                $(form).find('.error-message').remove();

                                // Display validation errors under each input field
                                let errors = xhr.responseJSON.errors;
                                $.each(errors, function (key, error) {
                                    // Handle inputs with array-like names, such as "name.ar" and "name.en"
                                    const [field, subfield] = key.split('.');
                                    let input = $(form).find(`[name="${field}[${subfield}]"]`);
                                    if (input.length) {
                                        input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                    } else {
                                        // Handle inputs with simple names
                                        let input = $(form).find(`[name="${key}"]`);
                                        if (input.length) {
                                            input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                        }
                                    }
                                });

                                // Show dynamic error message from the server response
                                Swal.fire({
                                    text: xhr.responseJSON.text,
                                    icon: xhr.responseJSON.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: xhr.responseJSON.confirmButtonText,
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

                // Cancel button click event listener
                cancelButton.addEventListener("click", (e) => {
                    e.preventDefault();
                    Swal.fire({
                        text: "هل أنت متأكد أنك تريد إلغاء التغييرات؟",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم، إلغاء",
                        cancelButtonText: "لا، عُد",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.reset();
                            modal.hide();
                        }
                    });
                });

                // Close button click event listener
                closeButton.addEventListener("click", (e) => {
                    e.preventDefault();
                    modal.hide(); // إغلاق النافذة
                });

                // Make sure the modal is refreshed properly to attach event listeners correctly
                modalElement.addEventListener('shown.bs.modal', () => {
                    // Reattach any dynamic event listeners if needed
                });
            }
        });
    };

    return {
        init: function () {
            initTagModals();
        }
    };
}();

// Initialize the script when the DOM content is loaded
KTUtil.onDOMContentLoaded(function () {
    KTUsersEditTag.init();
});

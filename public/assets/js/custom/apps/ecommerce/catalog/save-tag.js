"use strict";
var KTUsersAddTag = function () {
    const initTagForm = () => {
        const form = document.getElementById("kt_modal_add_tag_form");
        const submitButton = form.querySelector("button[type='submit']");
        const cancelButton = form.querySelector('[data-kt-tags-modal-action="cancel"]');
        const closeButton = document.querySelector('[data-kt-tags-modal-action="close"]');
        const modal = new bootstrap.Modal(document.getElementById("kt_modal_add_tag"));

        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            const formData = new FormData(form);

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
                                // Handle inputs with simple names, such as "price"
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
                            confirmButtonText:xhr.responseJSON.confirmButtonText ,
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

        // إغلاق النافذة عند الضغط على زر الإلغاء
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

        // إغلاق النافذة عند الضغط على زر الإغلاق
        closeButton.addEventListener("click", (e) => {
            e.preventDefault();
            modal.hide(); // إغلاق النافذة
        });
    };

    return {
        init: function () {
            initTagForm();
        }
    };
}();

// Initialize the script when the DOM content is loaded
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddTag.init();
});

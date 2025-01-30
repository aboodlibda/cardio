"use strict";
var KTAppEcommerceEditCoupon = function () {

    const initStatusToggle = () => {
        const statusEl = document.getElementById("kt_ecommerce_edit_coupon_status");
        const statusSelect = document.getElementById("kt_ecommerce_edit_coupon_status_select");
        const bgClasses = ["bg-success", "bg-danger"];

        $(statusSelect).on("change", (e) => {
            const value = e.target.value;
            statusEl.classList.remove(...bgClasses);
            if (value === "active") statusEl.classList.add("bg-success");
            else statusEl.classList.add("bg-danger");
        });
    };
    const initCouponForm = () => {
        const form = document.getElementById("kt_ecommerce_edit_coupon_form");
        const submitButton = form.querySelector("button[type='submit']");

        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            // Create FormData object
            const formData = new FormData(form);

            // Disable the submit button and show loading indicator
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
                        text: response.text ,
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
                                input = $(form).find(`[name="${key}"]`);
                                if (input.length) {
                                    input.after('<div class="error-message" style="color:red;">' + error[0] + '</div>');
                                }
                            }
                        });

                        Swal.fire({
                            text: xhr.responseJSON.text,
                            icon: "error",
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
    };

    return {
        init: function () {
            initCouponForm();
            initStatusToggle();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceEditCoupon.init();
});

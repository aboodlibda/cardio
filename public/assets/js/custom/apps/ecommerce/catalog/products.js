"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var KTAppEcommerceProducts = function () {
    var t, e, n = () => {
        t.querySelectorAll('[data-kt-ecommerce-product-filter="delete_row"]').forEach((t => {
            t.addEventListener("click", function (t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    o = n.querySelector('[data-kt-ecommerce-product-filter="product_name"]').innerText,
                    productId = n.getAttribute('data-product-id'); // Retrieve the product ID

                Swal.fire({
                    text: "Are you sure you want to delete " + o + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {
                    if (result.value) {
                        // Show loading indicator while processing
                        Swal.fire({
                            text: "Deleting " + o + "...",
                            icon: "info",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Perform AJAX request to delete the product
                        $.ajax({
                            url: `/cms/products/${productId}`,
                            method: 'DELETE',
                            success: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then(function () {
                                    e.row($(n)).remove().draw(); // Remove the row from the DataTable
                                });
                            },
                            error: function (xhr) {
                                if (xhr.status === 422) {
                                    let errors = xhr.responseJSON.errors;
                                    Swal.fire({
                                        text: xhr.responseJSON.text,
                                        icon: xhr.responseJSON.icon,
                                        buttonsStyling: false,
                                        confirmButtonText: xhr.responseJSON.confirmButtonText,
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                } else {
                                    Swal.fire({
                                        text: xhr.responseJSON.text,
                                        icon: xhr.responseJSON.icon,
                                        buttonsStyling: false,
                                        confirmButtonText: xhr.responseJSON.confirmButtonText,
                                        customClass: { confirmButton: "btn btn-primary" }
                                    });
                                }
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            text: o + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            });
        }));
    };

    return {
        init: function () {
            (t = document.querySelector("#kt_ecommerce_products_table")) && ((e = $(t).DataTable({
                info: false,
                order: [],
                pageLength: 10,
                columnDefs: [{ orderable: false, targets: 0 }, { orderable: false, targets: 3 }]
            })).on("draw", function () {
                n();
            }), document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener("keyup", function (t) {
                e.search(t.target.value).draw();
            }), n());
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceProducts.init();
});

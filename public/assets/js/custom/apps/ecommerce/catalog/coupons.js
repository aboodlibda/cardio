"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var KTAppEcommerceCoupons = function () {
    var t, e, n = () => {
        t.querySelectorAll('[data-kt-ecommerce-coupons-filter="delete_row"]').forEach((t => {
            t.addEventListener("click", function (t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    o = n.querySelector('[data-kt-ecommerce-coupons-filter="coupon_name"]').innerText,
                    couponId = n.getAttribute('data-coupon-id');

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
                            allowOutsideClick: false
                        });

                        $.ajax({
                            url: `/cms/coupons/${couponId}`,
                            method: 'DELETE', // Use DELETE method for deletion
                            success: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                }).then(function () {
                                    e.row($(n)).remove().draw(); // Remove the row from the DataTable
                                });
                            },
                            error: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                });
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
            (t = document.querySelector("#kt_ecommerce_coupons_table")) && ((e = $(t).DataTable({
                info: false,
                order: [],
                pageLength: 10,
                columnDefs: [{ orderable: false, targets: 0 }, { orderable: false, targets: 3 }]
            })).on("draw", function () {
                n();
            }), document.querySelector('[data-kt-ecommerce-coupons-filter="search"]').addEventListener("keyup", function (t) {
                e.search(t.target.value).draw();
            }), n());
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceCoupons.init();
});

"use strict";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const currentLanguage = document.documentElement.lang || "ar";

const messages = {

    en: {
        Deleted:"Are you sure you want to delete",
        NotDeleted:"was not deleted.",
        genericError: "An error occurred. Please try again later.",
        confirmButtonText: "Ok, got it!",
        YesButtonText: "Yes, delete!",
        NoButtonText:"No, cancel!",

    },

    ar: {
        Deleted:"هل انت متأكد أنك تريد حذف",
        NotDeleted:"لم يتم حذفه",
        genericError: "حدث خطأ. يرجى المحاولة لاحقًا.",
        confirmButtonText:"حسناً،فهمت",
        YesButtonText: "حسناً، احذفه",
        NoButtonText:"لا، تراجع",


    }
};

var KTAppEcommerceAttributes = function () {
    var t, e, n = () => {
        t.querySelectorAll('[data-kt-ecommerce-attribute-filter="delete_row"]').forEach((t => {
            t.addEventListener("click", function (t) {
                t.preventDefault();
                const n = t.target.closest("tr"),
                    o = n.querySelector('[data-kt-ecommerce-attribute-filter="attribute_name"]').innerText,
                    attributeId = n.getAttribute('data-attribute-id'); // Retrieve the attribute ID

                Swal.fire({
                    text: messages[currentLanguage].Deleted + ' ' + o + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: messages[currentLanguage].YesButtonText,
                    cancelButtonText: messages[currentLanguage].NoButtonText,
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
                            url: `/cms/attributes/${attributeId}`,
                            method: 'DELETE',
                            success: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                }).then(function () {
                                    e.row($(n)).remove().draw();
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
                            text: o + ' ' + messages[currentLanguage].NotDeleted,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: messages[currentLanguage].confirmButtonText,
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            });
        }));
    };

    return {
        init: function () {
            (t = document.querySelector("#kt_ecommerce_attribute_table")) && ((e = $(t).DataTable({
                info: false,
                order: [],
                pageLength: 10,
                columnDefs: [{ orderable: false, targets: 0 }, { orderable: false, targets: 3 }]
            })).on("draw", function () {
                n();
            }), document.querySelector('[data-kt-ecommerce-attribute-filter="search"]').addEventListener("keyup", function (t) {
                e.search(t.target.value).draw();
            }), n());
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceAttributes.init();
});

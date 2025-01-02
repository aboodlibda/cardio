"use strict";

let messages = {};

var lang = $('html').attr('lang');

const currentLanguage = document.documentElement.lang || "ar";

function loadMessagesWithCache(lang) {
    const cachedMessages = localStorage.getItem(`messages_${lang}`);
    if (cachedMessages) {
        messages = JSON.parse(cachedMessages);
        return Promise.resolve();
    } else {
        return $.getJSON(`/assets/js/custom/apps/ecommerce/language/languages.json`, function (data) {
            messages = data[lang] || data["en"];
            localStorage.setItem(`messages_${lang}`, JSON.stringify(messages));
        });
    }
}

loadMessagesWithCache(currentLanguage).then(() => {
    console.log("Messages loaded:", messages);
});

const dataTableLanguage = currentLanguage === "ar"
    ? '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json'
    : '';
var KTAppEcommerceAttributes = function () {
    return {
        init: function () {
            const table = $("#kt_ecommerce_attribute_table").DataTable({
                processing: true,
                serverSide: true,
                language: { url: dataTableLanguage },
                ajax: {
                    url: '/' + lang + '/cms/attributes/',
                    type: "GET",
                },
                columns: [
                    // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'id', name: 'id'},
                    { data: "checkbox", orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', orderable: true, searchable: true
                    },
                ],
                order: [[1, "asc"]]
                // target: "_all"

            });

            // Delete functionality
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            table.on("click", '[data-kt-ecommerce-attribute-filter="delete_row"]', function () {
                const attributeId = $(this).closest("div[data-attribute-id]").data("attribute-id");
                const attributeName = $(this).closest("div[data-attribute-id]").data("attribute-name");

                Swal.fire({
                    text: `${messages.Deleted} ${attributeName}?`,
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText:messages.YesButtonText,
                    cancelButtonText: messages.NoButtonText,
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            text: "Deleting " + attributeName + "...",
                            icon: "info",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $.ajax({
                            url:  '/' + lang + '/cms/attributes/' + attributeId,
                            type: "DELETE",
                            success: function (response) {
                                Swal.fire({
                                    text: response.text,
                                    icon: response.icon,
                                    buttonsStyling: false,
                                    confirmButtonText: response.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                }).then(() => table.ajax.reload());
                            },
                            error: function () {
                                Swal.fire({
                                    text: messages.genericError,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: messages.confirmButtonText,
                                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                                });
                            }
                        });
                    }else if(result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            text: attributeName + messages.NotDeleted,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: messages.confirmButtonText,
                            customClass: { confirmButton: "btn fw-bold btn-primary" }
                        });
                    }
                });
            });
        }
    };
}();
$('#kt_ecommerce_attribute_table').on('draw.dt', function () {
    KTMenu.createInstances();
});

KTUtil.onDOMContentLoaded(function () {
    KTAppEcommerceAttributes.init();

});

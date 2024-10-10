"use strict";

// Core function to manage the users table
var KTUsersList = function () {
    var table, baseToolbar, selectedToolbar, selectedCount, dataTableElement = document.getElementById("kt_table_users");

    // Setup event listeners for deleting a single row
    const setupDeleteRowEventListeners = () => {
        dataTableElement.querySelectorAll('[data-kt-users-table-filter="delete_row"]').forEach((deleteButton) => {
            deleteButton.addEventListener("click", (event) => {
                event.preventDefault();
                const row = event.target.closest("tr");
                const userName = row.querySelectorAll("td")[1].querySelectorAll("a")[1].innerText;

                showDeleteConfirmation(userName, () => {
                    // Delete the row if confirmed
                    table.row($(row)).remove().draw();
                    updateSelectedRows();
                });
            });
        });
    };

    // Show confirmation dialog for deleting a row or multiple rows
    const showDeleteConfirmation = (userName, onConfirm) => {
        Swal.fire({
            text: `Are you sure you want to delete ${userName}?`,
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
                onConfirm();
                Swal.fire({
                    text: `You have deleted ${userName}!`,
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
            } else if (result.dismiss === "cancel") {
                Swal.fire({
                    text: `${userName} was not deleted.`,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: { confirmButton: "btn fw-bold btn-primary" }
                });
            }
        });
    };

    // Setup event listeners for deleting multiple rows
    const setupDeleteSelectedEventListener = () => {
        const deleteSelectedButton = document.querySelector('[data-kt-user-table-select="delete_selected"]');
        deleteSelectedButton.addEventListener("click", () => {
            Swal.fire({
                text: "Are you sure you want to delete selected customers?",
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
                    Swal.fire({
                        text: "You have deleted all selected customers!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: { confirmButton: "btn fw-bold btn-primary" }
                    }).then(() => {
                        // Remove selected rows
                        dataTableElement.querySelectorAll('tbody [type="checkbox"]').forEach((checkbox) => {
                            if (checkbox.checked) {
                                table.row($(checkbox.closest("tbody tr"))).remove().draw();
                            }
                        });
                        // Uncheck header checkbox
                        dataTableElement.querySelectorAll('[type="checkbox"]')[0].checked = false;
                        updateSelectedRows();
                    });
                }
            });
        });
    };

    // Update visibility of toolbars based on selected rows
    const updateSelectedRows = () => {
        const checkboxes = dataTableElement.querySelectorAll('tbody [type="checkbox"]');
        let selected = false, count = 0;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                selected = true;
                count++;
            }
        });

        if (selected) {
            selectedCount.innerHTML = count;
            baseToolbar.classList.add("d-none");
            selectedToolbar.classList.remove("d-none");
        } else {
            baseToolbar.classList.remove("d-none");
            selectedToolbar.classList.add("d-none");
        }
    };

    // Initialize the DataTable and event listeners
    const initializeDataTable = () => {
        table = $(dataTableElement).DataTable({
            info: false,
            order: [],
            pageLength: 10,
            lengthChange: false,
            columnDefs: [
                { orderable: false, targets: 0 },
                { orderable: false, targets: 6 }
            ]
        });

        // Setup event listeners for table actions
        setupDeleteRowEventListeners();
        setupDeleteSelectedEventListener();

        // Setup search filter
        document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (event) => {
            table.search(event.target.value).draw();
        });

        // Setup reset filter
        document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", () => {
            document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((select) => {
                $(select).val("").trigger("change");
            });
            table.search("").draw();
        });

        // Update the selected rows count on draw
        table.on("draw", () => {
            updateSelectedRows();
        });
    };

    return {
        init: function () {
            if (dataTableElement) {
                baseToolbar = document.querySelector('[data-kt-user-table-toolbar="base"]');
                selectedToolbar = document.querySelector('[data-kt-user-table-toolbar="selected"]');
                selectedCount = document.querySelector('[data-kt-user-table-select="selected_count"]');
                initializeDataTable();
            }
        }
    };
}();

// Initialize the module when the DOM is fully loaded
KTUtil.onDOMContentLoaded(() => {
    KTUsersList.init();
});

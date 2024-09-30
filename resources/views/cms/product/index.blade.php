@extends('cms.layout.master')
@section('title',trans('dashboard_trans.All Products'))
@section('style')
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" fdprocessedid="hshx2z">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status" data-select2-id="select2-data-7-51xb" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                <option data-select2-id="select2-data-9-dnck"></option>
                                <option value="all">All</option>
                                <option value="published">Published</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="inactive">Inactive</option>
                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-bywf" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gjgj-container" aria-controls="select2-gjgj-container"><span class="select2-selection__rendered" id="select2-gjgj-container" role="textbox" aria-readonly="true" title="Status"><span class="select2-selection__placeholder">Status</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <!--end::Select2-->
                        </div>

                        <!--begin::Add product-->
                        <a href="/metronic8/demo3/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">
                            Add Product
                        </a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <!--begin::Table-->
                    <div id="kt_ecommerce_products_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer"><div id="" class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_ecommerce_products_table" style="width: 100%;"><colgroup><col data-dt-column="0" style="width: 36.3906px;"><col data-dt-column="1" style="width: 200px;"><col data-dt-column="2" style="width: 100px;"><col data-dt-column="3" style="width: 96.9531px;"><col data-dt-column="4" style="width: 100px;"><col data-dt-column="5" style="width: 100px;"><col data-dt-column="6" style="width: 100px;"><col data-dt-column="7" style="width: 105.156px;"></colgroup>
                                <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row"><th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1" colspan="1" aria-label="



            "><span class="dt-column-title">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1">
                </div>
            </span><span class="dt-column-order"></span></th><th class="min-w-200px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Product: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Product</span><span class="dt-column-order"></span></th><th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="SKU: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">SKU</span><span class="dt-column-order"></span></th><th class="text-end min-w-70px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Qty: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Qty</span><span class="dt-column-order"></span></th><th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Price: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Price</span><span class="dt-column-order"></span></th><th class="text-end min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Rating: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Rating</span><span class="dt-column-order"></span></th><th class="text-end min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="6" rowspan="1" colspan="1" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th><th class="text-end min-w-70px dt-orderable-none" data-dt-column="7" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th></tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600"><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/1.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 1</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">01880005</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="48">
                                        <span class="fw-bold ms-3">48</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">169.00</td>
                                    <td class="text-end pe-0" data-order="rating-4">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/2.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 2</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">03288008</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="6">
                                        <span class="badge badge-light-warning">Low stock</span>
                                        <span class="fw-bold text-warning ms-3">6</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">90.00</td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Published">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success">Published</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/3.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 3</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">01903001</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="41">
                                        <span class="fw-bold ms-3">41</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">194.00</td>
                                    <td class="text-end pe-0" data-order="rating-3">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/4.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 4</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">02307006</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="43">
                                        <span class="fw-bold ms-3">43</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">76.00</td>
                                    <td class="text-end pe-0" data-order="rating-3">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/5.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 5</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">01970002</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="38">
                                        <span class="fw-bold ms-3">38</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">105.00</td>
                                    <td class="text-end pe-0" data-order="rating-4">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/6.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 6</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">04636007</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="37">
                                        <span class="fw-bold ms-3">37</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">52.00</td>
                                    <td class="text-end pe-0" data-order="rating-3">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/7.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 7</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">02897002</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="45">
                                        <span class="fw-bold ms-3">45</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">220.00</td>
                                    <td class="text-end pe-0" data-order="rating-4">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/8.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 8</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">04413001</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="45">
                                        <span class="fw-bold ms-3">45</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">118.00</td>
                                    <td class="text-end pe-0" data-order="rating-3">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label ">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Inactive">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-danger">Inactive</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/9.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 9</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">03730001</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="3">
                                        <span class="badge badge-light-warning">Low stock</span>
                                        <span class="fw-bold text-warning ms-3">3</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">297.00</td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Published">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success">Published</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr><tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url(/metronic8/demo3/assets/media//stock/ecommerce/10.png);"></span>
                                            </a>
                                            <!--end::Thumbnail-->

                                            <div class="ms-5">
                                                <!--begin::Title-->
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 10</a>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">
                                        <span class="fw-bold">01573001</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric" data-order="44">
                                        <span class="fw-bold ms-3">44</span>
                                    </td>
                                    <td class="text-end pe-0 dt-type-numeric">173.00</td>
                                    <td class="text-end pe-0" data-order="rating-5">
                                        <div class="rating justify-content-end">
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                            <div class="rating-label checked">
                                                <i class="ki-duotone ki-star fs-6"></i>                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end pe-0" data-order="Scheduled">
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-primary">Scheduled</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i>                    </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/metronic8/demo3/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr></tbody>
                                <tfoot></tfoot></table></div><div id="" class="row"><div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"><div><select name="kt_ecommerce_products_table_length" aria-controls="kt_ecommerce_products_table" class="form-select form-select-solid form-select-sm" id="dt-length-0" fdprocessedid="ix8wh"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><label for="dt-length-0"></label></div></div><div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dt-paging paging_simple_numbers"><nav><ul class="pagination"><li class="dt-paging-button page-item disabled"><button class="page-link previous" role="link" type="button" aria-controls="kt_ecommerce_products_table" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button></li><li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_ecommerce_products_table" aria-current="page" data-dt-idx="0" fdprocessedid="vy2s1x">1</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_ecommerce_products_table" data-dt-idx="1" fdprocessedid="9bb5u">2</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_ecommerce_products_table" data-dt-idx="2" fdprocessedid="sitgho">3</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_ecommerce_products_table" data-dt-idx="3" fdprocessedid="85y6kh">4</button></li><li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_ecommerce_products_table" data-dt-idx="4" fdprocessedid="gr6ba4">5</button></li><li class="dt-paging-button page-item"><button class="page-link next" role="link" type="button" aria-controls="kt_ecommerce_products_table" aria-label="Next" data-dt-idx="next" fdprocessedid="i7s7k"><i class="next"></i></button></li></ul></nav></div></div></div></div>
                    <!--end::Table-->    </div>
                <!--end::Card body-->
            </div>
            <!--end::Products--></div>
        <!--end::Container-->				</div>

@endsection
@section('script')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection

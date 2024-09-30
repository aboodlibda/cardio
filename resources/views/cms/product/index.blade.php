@extends('cms.layout.master')
@section('title',trans('dashboard_trans.All Products'))
@section('style')
{{--    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css">

@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">Products</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="../../demo3/dist/index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item text-muted">Apps</li>
            <li class="breadcrumb-item text-muted">eCommerce</li>
            <li class="breadcrumb-item text-muted">Catalog</li>
            <li class="breadcrumb-item text-dark">Products</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="published">Published</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-200px">Product</th>
                            <th class="text-end min-w-100px">SKU</th>
                            <th class="text-end min-w-70px">Qty</th>
                            <th class="text-end min-w-100px">Price</th>
                            <th class="text-end min-w-100px">Rating</th>
                            <th class="text-end min-w-100px">Status</th>
                            <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 1</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04517009</span>
                            </td>
                            <td class="text-end pe-0" data-order="16">
                                <span class="fw-bold ms-3">16</span>
                            </td>
                            <td class="text-end pe-0">238</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/2.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 2</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02391008</span>
                            </td>
                            <td class="text-end pe-0" data-order="21">
                                <span class="fw-bold ms-3">21</span>
                            </td>
                            <td class="text-end pe-0">85</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/3.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 3</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02655005</span>
                            </td>
                            <td class="text-end pe-0" data-order="46">
                                <span class="fw-bold ms-3">46</span>
                            </td>
                            <td class="text-end pe-0">103</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/4.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 4</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04143002</span>
                            </td>
                            <td class="text-end pe-0" data-order="27">
                                <span class="fw-bold ms-3">27</span>
                            </td>
                            <td class="text-end pe-0">298</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/5.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 5</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03808004</span>
                            </td>
                            <td class="text-end pe-0" data-order="25">
                                <span class="fw-bold ms-3">25</span>
                            </td>
                            <td class="text-end pe-0">33</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/6.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 6</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01367008</span>
                            </td>
                            <td class="text-end pe-0" data-order="45">
                                <span class="fw-bold ms-3">45</span>
                            </td>
                            <td class="text-end pe-0">297</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/7.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 7</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02914004</span>
                            </td>
                            <td class="text-end pe-0" data-order="3">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">3</span>
                            </td>
                            <td class="text-end pe-0">93</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/8.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 8</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02474009</span>
                            </td>
                            <td class="text-end pe-0" data-order="15">
                                <span class="fw-bold ms-3">15</span>
                            </td>
                            <td class="text-end pe-0">177</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/9.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 9</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01406008</span>
                            </td>
                            <td class="text-end pe-0" data-order="10">
                                <span class="fw-bold ms-3">10</span>
                            </td>
                            <td class="text-end pe-0">48</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/10.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 10</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01186007</span>
                            </td>
                            <td class="text-end pe-0" data-order="35">
                                <span class="fw-bold ms-3">35</span>
                            </td>
                            <td class="text-end pe-0">40</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/11.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 11</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03553005</span>
                            </td>
                            <td class="text-end pe-0" data-order="47">
                                <span class="fw-bold ms-3">47</span>
                            </td>
                            <td class="text-end pe-0">119</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/12.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 12</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03159004</span>
                            </td>
                            <td class="text-end pe-0" data-order="45">
                                <span class="fw-bold ms-3">45</span>
                            </td>
                            <td class="text-end pe-0">155</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/13.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 13</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01938008</span>
                            </td>
                            <td class="text-end pe-0" data-order="32">
                                <span class="fw-bold ms-3">32</span>
                            </td>
                            <td class="text-end pe-0">208</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/14.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 14</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01584004</span>
                            </td>
                            <td class="text-end pe-0" data-order="20">
                                <span class="fw-bold ms-3">20</span>
                            </td>
                            <td class="text-end pe-0">108</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/15.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 15</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04534006</span>
                            </td>
                            <td class="text-end pe-0" data-order="14">
                                <span class="fw-bold ms-3">14</span>
                            </td>
                            <td class="text-end pe-0">299</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/16.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 16</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03884003</span>
                            </td>
                            <td class="text-end pe-0" data-order="22">
                                <span class="fw-bold ms-3">22</span>
                            </td>
                            <td class="text-end pe-0">192</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/17.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 17</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01330005</span>
                            </td>
                            <td class="text-end pe-0" data-order="25">
                                <span class="fw-bold ms-3">25</span>
                            </td>
                            <td class="text-end pe-0">168</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/18.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 18</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04883006</span>
                            </td>
                            <td class="text-end pe-0" data-order="35">
                                <span class="fw-bold ms-3">35</span>
                            </td>
                            <td class="text-end pe-0">283</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/19.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 19</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02342009</span>
                            </td>
                            <td class="text-end pe-0" data-order="14">
                                <span class="fw-bold ms-3">14</span>
                            </td>
                            <td class="text-end pe-0">275</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/20.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 20</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01768005</span>
                            </td>
                            <td class="text-end pe-0" data-order="41">
                                <span class="fw-bold ms-3">41</span>
                            </td>
                            <td class="text-end pe-0">210</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/21.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 21</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01936008</span>
                            </td>
                            <td class="text-end pe-0" data-order="5">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">5</span>
                            </td>
                            <td class="text-end pe-0">158</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/22.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 22</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03739005</span>
                            </td>
                            <td class="text-end pe-0" data-order="1">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">1</span>
                            </td>
                            <td class="text-end pe-0">103</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/23.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 23</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01172003</span>
                            </td>
                            <td class="text-end pe-0" data-order="34">
                                <span class="fw-bold ms-3">34</span>
                            </td>
                            <td class="text-end pe-0">87</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/24.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 24</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04912008</span>
                            </td>
                            <td class="text-end pe-0" data-order="18">
                                <span class="fw-bold ms-3">18</span>
                            </td>
                            <td class="text-end pe-0">288</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/25.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 25</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01265003</span>
                            </td>
                            <td class="text-end pe-0" data-order="19">
                                <span class="fw-bold ms-3">19</span>
                            </td>
                            <td class="text-end pe-0">19</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/26.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 26</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03863005</span>
                            </td>
                            <td class="text-end pe-0" data-order="32">
                                <span class="fw-bold ms-3">32</span>
                            </td>
                            <td class="text-end pe-0">174</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/27.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 27</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04154005</span>
                            </td>
                            <td class="text-end pe-0" data-order="41">
                                <span class="fw-bold ms-3">41</span>
                            </td>
                            <td class="text-end pe-0">68</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/28.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 28</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04427006</span>
                            </td>
                            <td class="text-end pe-0" data-order="38">
                                <span class="fw-bold ms-3">38</span>
                            </td>
                            <td class="text-end pe-0">222</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/29.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 29</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03908007</span>
                            </td>
                            <td class="text-end pe-0" data-order="25">
                                <span class="fw-bold ms-3">25</span>
                            </td>
                            <td class="text-end pe-0">32</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/30.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 30</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03379007</span>
                            </td>
                            <td class="text-end pe-0" data-order="31">
                                <span class="fw-bold ms-3">31</span>
                            </td>
                            <td class="text-end pe-0">294</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/31.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 31</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02939005</span>
                            </td>
                            <td class="text-end pe-0" data-order="16">
                                <span class="fw-bold ms-3">16</span>
                            </td>
                            <td class="text-end pe-0">85</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/32.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 32</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02285001</span>
                            </td>
                            <td class="text-end pe-0" data-order="20">
                                <span class="fw-bold ms-3">20</span>
                            </td>
                            <td class="text-end pe-0">256</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/33.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 33</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01210001</span>
                            </td>
                            <td class="text-end pe-0" data-order="38">
                                <span class="fw-bold ms-3">38</span>
                            </td>
                            <td class="text-end pe-0">236</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/34.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 34</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01333004</span>
                            </td>
                            <td class="text-end pe-0" data-order="30">
                                <span class="fw-bold ms-3">30</span>
                            </td>
                            <td class="text-end pe-0">123</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/35.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 35</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04571003</span>
                            </td>
                            <td class="text-end pe-0" data-order="32">
                                <span class="fw-bold ms-3">32</span>
                            </td>
                            <td class="text-end pe-0">39</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/36.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 36</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04493006</span>
                            </td>
                            <td class="text-end pe-0" data-order="28">
                                <span class="fw-bold ms-3">28</span>
                            </td>
                            <td class="text-end pe-0">111</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/37.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 37</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01396006</span>
                            </td>
                            <td class="text-end pe-0" data-order="7">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">7</span>
                            </td>
                            <td class="text-end pe-0">287</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/38.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 38</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04983009</span>
                            </td>
                            <td class="text-end pe-0" data-order="46">
                                <span class="fw-bold ms-3">46</span>
                            </td>
                            <td class="text-end pe-0">157</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/39.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 39</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04821005</span>
                            </td>
                            <td class="text-end pe-0" data-order="24">
                                <span class="fw-bold ms-3">24</span>
                            </td>
                            <td class="text-end pe-0">295</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/40.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 40</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03831005</span>
                            </td>
                            <td class="text-end pe-0" data-order="5">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">5</span>
                            </td>
                            <td class="text-end pe-0">189</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/41.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 41</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02498006</span>
                            </td>
                            <td class="text-end pe-0" data-order="14">
                                <span class="fw-bold ms-3">14</span>
                            </td>
                            <td class="text-end pe-0">177</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/42.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 42</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">03579007</span>
                            </td>
                            <td class="text-end pe-0" data-order="48">
                                <span class="fw-bold ms-3">48</span>
                            </td>
                            <td class="text-end pe-0">77</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/43.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 43</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04433001</span>
                            </td>
                            <td class="text-end pe-0" data-order="47">
                                <span class="fw-bold ms-3">47</span>
                            </td>
                            <td class="text-end pe-0">16</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/44.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 44</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02305002</span>
                            </td>
                            <td class="text-end pe-0" data-order="27">
                                <span class="fw-bold ms-3">27</span>
                            </td>
                            <td class="text-end pe-0">136</td>
                            <td class="text-end pe-0" data-order="rating-4">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/45.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 45</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01965001</span>
                            </td>
                            <td class="text-end pe-0" data-order="35">
                                <span class="fw-bold ms-3">35</span>
                            </td>
                            <td class="text-end pe-0">194</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/46.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 46</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01822001</span>
                            </td>
                            <td class="text-end pe-0" data-order="23">
                                <span class="fw-bold ms-3">23</span>
                            </td>
                            <td class="text-end pe-0">237</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/47.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 47</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">01890009</span>
                            </td>
                            <td class="text-end pe-0" data-order="15">
                                <span class="fw-bold ms-3">15</span>
                            </td>
                            <td class="text-end pe-0">237</td>
                            <td class="text-end pe-0" data-order="rating-5">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Published">
                                <!--begin::Badges-->
                                <div class="badge badge-light-success">Published</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/48.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 48</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02439007</span>
                            </td>
                            <td class="text-end pe-0" data-order="19">
                                <span class="fw-bold ms-3">19</span>
                            </td>
                            <td class="text-end pe-0">219</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/49.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 49</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">04912003</span>
                            </td>
                            <td class="text-end pe-0" data-order="8">
                                <span class="badge badge-light-warning">Low stock</span>
                                <span class="fw-bold text-warning ms-3">8</span>
                            </td>
                            <td class="text-end pe-0">159</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Scheduled">
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">Scheduled</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Thumbnail-->
                                    <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                        <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/50.png);"></span>
                                    </a>
                                    <!--end::Thumbnail-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">Product 50</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">02360007</span>
                            </td>
                            <td class="text-end pe-0" data-order="23">
                                <span class="fw-bold ms-3">23</span>
                            </td>
                            <td class="text-end pe-0">231</td>
                            <td class="text-end pe-0" data-order="rating-3">
                                <div class="rating justify-content-end">
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label checked">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                    <div class="rating-label">
                                        <i class="ki-duotone ki-star fs-6"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Inactive">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Inactive</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">Delete</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection

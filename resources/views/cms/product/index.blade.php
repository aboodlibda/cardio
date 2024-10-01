@extends('cms.layout.master')
@section('title',trans('dashboard_trans.All Products'))
@section('style')
    @if(App::getLocale()=='ar')
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
    @else
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Products')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.All Products')}}</li>

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
                            <select class="form-select form-select-solid"  data-hide-search="true"  data-placeholder="status" data-kt-ecommerce-product-filter="status">
                                <option disabled hidden selected>status</option>
                                <option value="all">All</option>
                                <option value="published">Published</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="{{route('products.create')}}" class="btn btn-primary">{{trans('dashboard_trans.Add Product')}}</a>
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
                            <th class="min-w-200px">{{trans('dashboard_trans.Product')}}</th>
                            <th class="text-end min-w-100px">SKU</th>
                            <th class="text-end min-w-70px">{{trans('dashboard_trans.QTY')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Price')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Rating')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Status')}}</th>
                            <th class="text-end min-w-70px">{{trans('dashboard_trans.Actions')}}</th>
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
                                        <span class="symbol-label" style="background-image:url({{url('assets/media//stock/ecommerce/1.png')}});"></span>
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
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{trans('dashboard_trans.Actions')}}
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">{{trans('dashboard_trans.Edit')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">{{trans('dashboard_trans.Delete')}}</a>
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

@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Order list'))
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
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">Orders Listing</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="../../demo3/dist/index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item text-muted">Apps</li>
            <li class="breadcrumb-item text-muted">eCommerce</li>
            <li class="breadcrumb-item text-muted">Sales</li>
            <li class="breadcrumb-item text-dark">Orders Listing</li>
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
                            <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="{{trans('dashboard_trans.Search Order')}}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Flatpickr-->
                        <div class="input-group w-250px">
                            <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" />
                            <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                        </div>
                        <!--end::Flatpickr-->
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid"  data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Status')}}" data-kt-ecommerce-order-filter="status">
                                <option disabled hidden="" selected>{{trans('dashboard_trans.Status')}}</option>
                                <option value="all">{{trans('dashboard_trans.All')}}</option>
                                <option value="Cancelled">{{trans('dashboard_trans.Cancelled')}}</option>
                                <option value="Completed">{{trans('dashboard_trans.Completed')}}</option>
                                <option value="Denied">{{trans('dashboard_trans.Denied')}}</option>
                                <option value="Expired">{{trans('dashboard_trans.Expired')}}</option>
                                <option value="Failed">{{trans('dashboard_trans.Failed')}}</option>
                                <option value="Pending">{{trans('dashboard_trans.Pending')}}</option>
                                <option value="Processing">{{trans('dashboard_trans.Processing')}}</option>
                                <option value="Refunded">{{trans('dashboard_trans.Refunded')}}</option>
                                <option value="Delivered">{{trans('dashboard_trans.Delivered')}}</option>
                                <option value="Delivering">{{trans('dashboard_trans.Delivering')}}</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="../../demo3/dist/apps/ecommerce/catalog/add-product.html" class="btn btn-primary">{{trans('dashboard_trans.Add Order')}}</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_sales_table">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_sales_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-100px">{{trans('dashboard_trans.Order ID')}}</th>
                            <th class="min-w-175px">{{trans('dashboard_trans.Customer')}}</th>
                            <th class="text-end min-w-70px">{{trans('dashboard_trans.Status')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Total')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Date Added')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Date Modified')}}</th>
                            <th class="text-end min-w-100px">{{trans('dashboard_trans.Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                </div>
                            </td>
                            <td data-kt-ecommerce-order-filter="order_id">
                                <a href="../../demo3/dist/apps/ecommerce/sales/details.html" class="text-gray-800 text-hover-primary fw-bold">14186</a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin:: Avatar -->
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="../../demo3/dist/apps/user-management/users/view.html">
                                            <div class="symbol-label">
                                                <img src="{{asset('assets/media/avatars/300-5.jpg')}}" alt="Sean Bean" class="w-100" />
                                            </div>
                                        </a>
                                    </div>
                                    <!--end::Avatar-->
                                    <div class="ms-5">
                                        <!--begin::Title-->
                                        <a href="../../demo3/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary fs-5 fw-bold">Sean Bean</a>
                                        <!--end::Title-->
                                    </div>
                                </div>
                            </td>
                            <td class="text-end pe-0" data-order="Denied">
                                <!--begin::Badges-->
                                <div class="badge badge-light-danger">Denied</div>
                                <!--end::Badges-->
                            </td>
                            <td class="text-end pe-0">
                                <span class="fw-bold">$51.00</span>
                            </td>
                            <td class="text-end" data-order="2023-07-14">
                                <span class="fw-bold">14/07/2023</span>
                            </td>
                            <td class="text-end" data-order="2023-07-18">
                                <span class="fw-bold">18/07/2023</span>
                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{trans('dashboard_trans.Actions')}}
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{ route('show-order') }}" class="menu-link px-3">{{trans('dashboard_trans.View')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/apps/ecommerce/sales/edit-order.html" class="menu-link px-3">{{trans('dashboard_trans.Edit')}}</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3" data-kt-ecommerce-order-filter="delete_row">{{trans('dashboard_trans.Delete')}}</a>
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
    <script src="{{asset('assets/js/custom/apps/ecommerce/sales/listing.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

@endsection

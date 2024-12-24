@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Products Properties'))
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Attributes')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"> <a href="{{ route('attributes.index') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Attributes')}}</a></li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.All Attributes')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Category-->
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
                            <input type="text" data-kt-ecommerce-attribute-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="{{trans('dashboard_trans.Search Attribute')}}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <a href="{{ route('attributes.create') }}" class="btn btn-primary">{{trans('dashboard_trans.Add Attribute')}}</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_attribute_table" >
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_attribute_table .form-check-input" value="1" />
                                </div>
                            </th>
                            <th class="min-w-250px">{{trans('dashboard_trans.Attributes')}}</th>
                            <th class="min-w-150px">{{trans('dashboard_trans.Status')}}</th>
                            <th class="text-end min-w-70px">{{trans('dashboard_trans.Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        @foreach($attributes as $attribute)
                            <tr data-attribute-id="{{ $attribute->id }}">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td class="min-w-20px">
                                    <div class="d-flex">
                                        <div class="ms-5">
                                            <!--begin::Title-->
                                            <a href="{{ route('attributes.edit',$attribute->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1" data-kt-ecommerce-attribute-filter="attribute_name">{{ $attribute->name }}</a>
                                            <!--end::Title-->
                                            <!--begin::Description-->
{{--                                            <div class="text-muted fs-7 fw-bold">{{ $attribute->description }}</div>--}}
                                            <!--end::Description-->
                                        </div>
                                    </div>
                                </td>
                                <td>

                                </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">{{trans('dashboard_trans.Actions')}}
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('attributes.edit',$attribute->id) }}" class="menu-link px-3">{{trans('dashboard_trans.Edit')}}</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" >
                                            <a href="#" class="menu-link px-3" data-kt-ecommerce-attribute-filter="delete_row">{{trans('dashboard_trans.Delete')}}</a>

                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Category-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/attributes.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

@endsection

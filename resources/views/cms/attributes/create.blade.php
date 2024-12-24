@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Add Attribute'))
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
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Add Attribute')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Attributes')}}</li>
            <li class="breadcrumb-item text-muted"><a href="{{ route('attributes.index') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Attributes')}}</a></li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add Attribute')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <form id="kt_ecommerce_add_attribute_form" action="{{ route('attributes.store') }}" method="POST" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="{{route('attributes.create')}}">
                @csrf
                <!--begin::Aside column-->
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{trans('dashboard_trans.General')}}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="row card-body pt-0">
                            @foreach(config('lang') as $key => $lang)
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{trans('dashboard_trans.Name')}} ({{$lang}})</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text"  name="name[{{$key}}]" value="{{old('name.'.$key)}}" class="form-control mb-2 @error('name.'.$key) is-invalid @enderror" placeholder="{{trans('dashboard_trans.Attribute Name')}}"  />
                                    <!--end::Input-->
                                    <div id="name-{{$key}}-error" class="error-message"></div>
                                </div>
                            @endforeach
                            <!--begin::Description-->
                            <div class="text-muted fs-7 mb-5">{{trans('dashboard_trans.A attribute name is required and recommended to be unique')}}.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                    <!--begin::Meta options-->

                    <!--end::Meta options-->
                    <!--begin::Automation-->

                    <!--end::Automation-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('attributes.index') }}" id="kt_ecommerce_add_attribute_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_attribute_submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('dashboard_trans.Create')}}</span>
                            <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-attribute.js')}}"></script>
@endsection

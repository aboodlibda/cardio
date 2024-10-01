@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Tags'))
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
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">New Target</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="../../demo3/dist/index.html" class="text-muted text-hover-primary">Home</a>
            </li>
            <li class="breadcrumb-item text-muted">Utilities</li>
            <li class="breadcrumb-item text-muted">Modals</li>
            <li class="breadcrumb-item text-muted">Forms</li>
            <li class="breadcrumb-item text-dark">New Target</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Modal - New Target-->
    <div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form id="kt_modal_new_target_form" class="form" action="#">
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">{{trans('dashboard_trans.Add New Tag')}}</h1>
                            <!--end::Title-->
{{--                            <!--begin::Description-->--}}
{{--                            <div class="text-muted fw-semibold fs-5">If you need more info, please check--}}
{{--                                <a href="#" class="fw-bold link-primary">Project Guidelines</a>.</div>--}}
{{--                            <!--end::Description-->--}}
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">{{trans('dashboard_trans.Tag Name')}}</span>
                                <span class="ms-1" data-bs-toggle="tooltip" title="{{trans('dashboard_trans.Tag Name')}}">
										<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="{{trans('dashboard_trans.Tag Name')}}" name="tag" />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">{{trans('dashboard_trans.Icon')}}</span>
                                <span class="ms-1" data-bs-toggle="tooltip">
										<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span>
                            </label>
                            <!--end::Label-->
                            <input class="form-control form-control-solid" value="" name="icon" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">{{trans('dashboard_trans.Cancel')}}</button>
                            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                                <span class="indicator-label">{{trans('dashboard_trans.Create')}}</span>
                                <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Heading-->
                    <div class="card-px text-center pt-15 pb-15">
                        <!--begin::Title-->
                        <h2 class="fs-2x fw-bold mb-0">{{trans('dashboard_trans.Add New Tag')}}</h2>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fs-4 fw-semibold py-7">{{trans('dashboard_trans.Click on the below buttons to launch')}}
                            <br />a new tag.</p>
                        <!--end::Description-->
                        <!--begin::Action-->
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">{{trans('dashboard_trans.Add New Tag')}}</a>
                        <!--end::Action-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Illustration-->
                    <div class="text-center pb-15 px-5">
                        <img src="assets/media/illustrations/dozzy-1/17.png" alt="" class="mw-100 h-200px h-sm-325px" />
                    </div>
                    <!--end::Illustration-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/new-target.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection


@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Edit Category'))
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
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Edit Category')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Categories')}}</li>
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('categories.index') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.All Categories')}}</a>
            </li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Edit Category')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <form id="kt_ecommerce_edit_category_form" class="form d-flex flex-column flex-lg-row" method="POST" action="{{ route('categories.update',$category->id) }}" data-kt-redirect="{{route('categories.edit',$category->id)}}">
               @csrf
                @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{trans('dashboard_trans.Image')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>.image-input-placeholder { background-image: url({{asset('assets/media/svg/files/blank-image.svg')}}''); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url({{asset('assets/media/svg/files/blank-image-dark.svg')}}''); }</style>
                            <!--end::Image input placeholder-->
                            <!--begin::Image input-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{asset('storage/'.$category->image)}}"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Inputs-->
                                    <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
													<i class="ki-duotone ki-cross fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
													<i class="ki-duotone ki-cross fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted')}}</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{trans('dashboard_trans.Status')}}</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_edit_category_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" name="status"  data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}" id="kt_ecommerce_edit_category_status_select">
                                <option disabled selected hidden>{{trans('dashboard_trans.Select an option')}}</option>
                                <option value="active" @selected($category->status == 'active')>{{trans('dashboard_trans.Active')}}</option>
                                <option value="inactive" @selected($category->status == 'inactive')>{{trans('dashboard_trans.Inactive')}}</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the category status')}}.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Template settings-->

                    <!--end::Template settings-->
                </div>
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
                            <!--begin::Input group-->
                            @foreach(config('lang') as $key => $lang)
                            <div class="col-md-6 mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">{{trans('dashboard_trans.Category Name')}} ({{$lang}})</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name[{{$key}}]" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Category Name')}}" value="{{$category->getTranslation('name',$key)}}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{trans('dashboard_trans.A category name is required and recommended to be unique')}}.</div>
                                <!--end::Description-->
                            </div>
                            @endforeach
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            @foreach(config('lang') as $key => $lang)
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">{{trans('dashboard_trans.Description')}} ({{$lang}})</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <div>
                                        <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{$category->getTranslation('description',$key)}}</textarea>
                                    </div>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7">{{trans('dashboard_trans.Set a description to the for better visibility')}}.</div>
                                    <!--end::Description-->
                                    <div id="description.{{$key}}-error" class="error-message"></div>

                                </div>
                            @endforeach
                            <!--end::Input group-->
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
                        <a href="{{ route('categories.index') }}" id="kt_ecommerce_edit_category_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_edit_category_submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('dashboard_trans.Save Edit')}}</span>
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
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/edit-category.js')}}"></script>

@endsection

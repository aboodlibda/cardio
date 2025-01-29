@extends('cms.layout.master')
@section('title',trans('dashboard_trans.Add new products'))
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.Add Product')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted"><a class="text-muted text-hover-primary" href="{{ route('products.index') }}">{{trans('dashboard_trans.Products')}}</a></li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.Add new products')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Form-->
            <form id="kt_ecommerce_add_product_form" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#" >
               @csrf
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
                            <style>.image-input-placeholder { background-image: url({{url('assets/media/svg/files/blank-image.svg')}}''); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url({{url('assets/media/svg/files/blank-image-dark.svg')}}''); }</style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" />
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
                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted')}}</div>
                            <!--end::Description-->
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" name="status" data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}" id="kt_ecommerce_add_product_status_select">
                                <option></option>
                                <option value="published">{{trans('dashboard_trans.Published')}}</option>
                                <option value="draft">{{trans('dashboard_trans.Draft')}}</option>
{{--                                <option value="scheduled">{{trans('dashboard_trans.Scheduled')}}</option>--}}
                                <option value="unpublished">{{trans('dashboard_trans.Unpublished')}}</option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product status')}}.</div>
                            <!--end::Description-->
                            <!--begin::Datepicker-->
                            <div class="d-none mt-10">
                                <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                                <input class="form-control" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date & time" />
                            </div>
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{trans('dashboard_trans.Product Details')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label">{{trans('dashboard_trans.Categories')}}</label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select class="form-select mb-2 select2-hidden-accessible" data-control="select2" name="category_id[]" data-hide-search="true"  multiple="multiple"  aria-hidden="true"  data-placeholder="{{trans('dashboard_trans.Select an option')}}">
                                <option></option>
                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7 mb-7">{{trans('dashboard_trans.Add product to a category')}}.</div>
                            <!--end::Description-->
                            <!--end::Input group-->
                            <!--begin::Button-->
                            <a href="#" class="btn btn-light-primary btn-sm mb-10">
                                <i class="ki-duotone ki-plus fs-2"></i>{{trans('dashboard_trans.Create new category')}}</a>
                            <!--end::Button-->
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label d-block">{{trans('dashboard_trans.Tags')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select mb-2 select2-hidden-accessible" name="tag_id[]" data-control="select2" data-kt-select2="true"   data-placeholder="{{trans('dashboard_trans.Select an option')}}" data-allow-clear="true" multiple="multiple"  aria-hidden="true" >
                                <option></option>
                            </select>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">{{trans('dashboard_trans.Add tags to a product')}}.</div>
                            <!--end::Description-->
                            <!--end::Input group-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->
                    <!--begin::Weekly sales-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>{{trans('dashboard_trans.Weekly Sales')}}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <span class="text-muted">{{trans('dashboard_trans.No data available. Sales data will begin capturing once product has been published')}}.</span>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Weekly sales-->

                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general">{{trans('dashboard_trans.General')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced">{{trans('dashboard_trans.Advanced')}}</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
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
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Product Name')}} ({{$lang}})</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name[{{$key}}]" id="name" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Product Name')}}" value="{{old('name.'.$key)}}" />
                                            <!--end::Input-->
                                            <div id="name-{{ $key }}-error" class="error-message"></div>
                                        </div>
                                        @endforeach
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-10">{{trans('dashboard_trans.A product name is required and recommended to be unique')}}.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        @foreach(config('lang') as $key => $lang)
                                            <div class="fv-row mb-5">
                                                <!--begin::Label-->
                                                <label class="form-label">{{trans('dashboard_trans.Description')}} ({{$lang}})</label>
                                                <!--end::Label-->
                                                <!--begin::Editor-->
                                                <div>
                                                    <textarea name="description[{{$key}}]" class="form-control @error('description') is-invalid @enderror">{{old('description.'.$key)}}</textarea>
                                                </div>
                                                <!--end::Editor-->
                                                <div id="description-{{$key}}-error" class="error-message"></div>
                                            </div>
                                        @endforeach
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7 mb-10">{{trans('dashboard_trans.Set a description to the for better visibility')}}.</div>
                                        <!--end::Description-->
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->
                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Media')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-2">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="kt_ecommerce_add_product_media">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">{{trans('dashboard_trans.Drop files here or click to upload')}}.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-400">{{trans('dashboard_trans.Upload up to 10 files')}}</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product media gallery')}}.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Media-->
                                <!--begin::Pricing-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Pricing')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Base Price')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="price" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Product price')}}" value="{{old('price')}}" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product price')}}.</div>
                                            <!--end::Description-->
                                            <div id="price-error" class="error-message"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">{{trans('dashboard_trans.Discount Type')}}
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product">
																<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span></label>
                                            <!--End::Label-->
                                            <!--begin::Row-->
                                            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																			<input class="form-check-input" type="radio" name="discount_type" @checked(old('no_discount')) value="no_discount" checked="checked" />
																		</span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
																			<span class="fs-4 fw-bold text-gray-800 d-block">{{trans('dashboard_trans.No Discount')}}</span>
																		</span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																			<input class="form-check-input" type="radio" @checked(old('percentage')) name="discount_type" value="percentage" />
																		</span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
																			<span class="fs-4 fw-bold text-gray-800 d-block">{{trans('dashboard_trans.Percentage %')}}</span>
																		</span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                        <!--begin::Radio-->
                                                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																			<input class="form-check-input" type="radio" name="discount_type" @checked(old('fixed_price')) value="fixed_price" />
																		</span>
                                                        <!--end::Radio-->
                                                        <!--begin::Info-->
                                                        <span class="ms-5">
																			<span class="fs-4 fw-bold text-gray-800 d-block">{{trans('dashboard_trans.Fixed Price')}}</span>
																		</span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                            <!--begin::Label-->
                                            <label class="form-label">{{trans('dashboard_trans.Set Discount Percentage')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Slider-->
                                            <div class="d-flex flex-column text-center mb-5">
                                                <div class="d-flex align-items-start justify-content-center mb-7">
                                                    <span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                                                    <span class="fw-bold fs-4 mt-1 ms-2">%</span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                            </div>
                                            <!--end::Slider-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set a percentage discount to be applied on this product')}}.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                            <!--begin::Label-->
                                            <label class="form-label">{{trans('dashboard_trans.Fixed Discounted Price')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="discounted_price" value="{{old('discounted_price')}}" class="form-control mb-2" placeholder="Discounted price" />
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Set the discounted product price. The product will be reduced at the determined fixed price')}}</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Tax-->
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">{{trans('dashboard_trans.Tax Class')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Select2-->
                                                <select class="form-select mb-2" data-control="select2" name="tax_type"  data-hide-search="true" data-placeholder="{{trans('dashboard_trans.Select an option')}}">
                                                    <option></option>
                                                    <option value="free" @selected(old('tax_type') == 'free')>{{trans('dashboard_trans.Tax Free')}}</option>
                                                    <option value="taxable_goods" @selected(old('taxable_goods') == 'taxable_goods')>{{trans('dashboard_trans.Taxable Goods')}}</option>
                                                    <option value="downloadable_product" @selected(old('downloadable_product') == 'downloadable_product')>{{trans('dashboard_trans.Downloadable Product')}}</option>
                                                </select>
                                                <!--end::Select2-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product tax class')}}.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="form-label">{{trans('dashboard_trans.VAT Amount (%)')}}</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control mb-2" name="vat_amount" value="{{old('vat_amount')}}" />
                                                <!--end::Input-->
                                                <!--begin::Description-->
                                                <div class="text-muted fs-7">{{trans('dashboard_trans.Set the product VAT about')}}.</div>
                                                <!--end::Description-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end:Tax-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Pricing-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::Inventory-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Inventory')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!-- Label -->
                                            <label class="required form-label">{{trans('dashboard_trans.SKU')}}</label>
                                            <!-- Input -->
                                            <input type="text" readonly name="SKU" id="sku-input" class="form-control mb-2" placeholder="{{trans('dashboard_trans.SKU')}}" value="" />
                                            <!-- Description -->
{{--                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Enter the product SKU')}}.</div>--}}
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="required form-label">{{trans('dashboard_trans.Quantity')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <div class="d-flex gap-3">
                                                <input type="number" name="quantity" class="form-control mb-2" placeholder="{{trans('dashboard_trans.Quantity')}}" value="" />
                                            </div>
                                            <!--end::Input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Enter the product quantity')}}.</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
{{--                                        <div class="fv-row">--}}
{{--                                            <!--begin::Label-->--}}
{{--                                            <label class="form-label">{{trans('dashboard_trans.Allow Backorders')}}</label>--}}
{{--                                            <!--end::Label-->--}}
{{--                                            <!--begin::Input-->--}}
{{--                                            <div class="form-check form-check-custom form-check-solid mb-2">--}}
{{--                                                <input class="form-check-input" type="checkbox" value="" />--}}
{{--                                                <label class="form-check-label">{{trans('dashboard_trans.Yes')}}</label>--}}
{{--                                            </div>--}}
{{--                                            <!--end::Input-->--}}
{{--                                            <!--begin::Description-->--}}
{{--                                            <div class="text-muted fs-7">{{trans('dashboard_trans.Allow customers to purchase products that are out of stock')}}.</div>--}}
{{--                                            <!--end::Description-->--}}
{{--                                        </div>--}}
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Inventory-->
                                <!--begin::Variations-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>{{trans('dashboard_trans.Variations')}}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                                            <!--begin::Label-->
                                            <label class="form-label">{{trans('dashboard_trans.Add Product Variations')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Repeater-->
                                            <div id="kt_ecommerce_add_product_options">
                                                <!--begin::Form group-->
                                                <div class="form-group" data-repeater-list="kt_ecommerce_add_product_options_list">
                                                    <div>
                                                        <div class="d-flex flex-column gap-3">
                                                            <div class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                <!--begin::Select2-->
                                                                <div class="w-100 w-md-200px">
                                                                    <select class="form-select mb-2 select2-hidden-accessible" name="attribute_id[]" data-control="select2" data-kt-select2="true"   data-placeholder="{{trans('dashboard_trans.Select an option')}}" data-allow-clear="true"  aria-hidden="true" >
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <!--end::Select2-->
                                                                <!--begin::Input-->
                                                                <input type="text" class="form-control mw-100 w-200px" name="product_option_value[]" placeholder="Variation" />
                                                                <!--end::Input-->
                                                                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                                    <i class="ki-duotone ki-cross fs-1">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Form group-->
                                                <!--begin::Form group-->
                                                <div class="form-group mt-5">
                                                    <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                                        <i class="ki-duotone ki-plus fs-2"></i>{{trans('dashboard_trans.Add another variation')}}</button>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>                                        <!--end::Input group-->
                                        <!--begin::Card body-->

                                    </div>
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label">({{'slug'}}){{ 'عنوان الرابط' }}</label>
                                            <!--end::Label-->
                                            <!--begin::Input group with button-->
                                            <div class="input-group mb-2">
                                                <input type="text" id="slug" class="form-control" name="slug" placeholder="عنوان الرابط" />
                                            </div>
                                            <!--end::Input group with button-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">{{ 'توليد عنوان رابط تلقائي' }}</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Variations-->
                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('products.index') }}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{trans('dashboard_trans.Cancel')}}</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">{{trans('dashboard_trans.Create')}}</span>
                            <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...
											<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    @if(App::getLocale()=='ar')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
    @endif
    <script>
        const routes = {
            post: "{{ route('store-media') }}",
        };
        const categories = {
            get: "{{ route('getCategories') }}",
        };
        const tags = {
            get: "{{ route('getTags') }}",
        };
        const attributes = {
            get: "{{ route('getAttributes') }}",
        };
    </script>
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <!--end::Custom Javascript-->



    <script>
        document.querySelectorAll('input[name]').forEach(function(input) {
            input.addEventListener('input', function() {
                // Check if the input field's name is "name[en]"
                if (this.name === 'name[en]') {
                    let productName = this.value;
                    let slug = productName
                        .toLowerCase() // Convert to lowercase
                        .trim() // Remove leading and trailing spaces
                        .replace(/[\s\W-]+/g, '-') // Replace spaces and non-word characters with dashes
                        .replace(/^-+|-+$/g, ''); // Remove leading and trailing dashes

                    // Set the slug value in the slug input field
                    document.getElementById('slug').value = slug;
                }
            });
        });


    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const skuInput = document.getElementById('sku-input');

            // Function to generate random SKU
            function generateSKU() {
                const randomNumber = Math.floor(100000 + Math.random() * 900000); // Generates 6-digit random number
                return `SKU-${randomNumber}`;
            }

            // Generate SKU when the page loads if the field is empty
            if (skuInput && skuInput.value.trim() === '') {
                skuInput.value = generateSKU();
            }

            // Optional: Generate SKU on click if the field is empty
            skuInput.addEventListener('focus', function () {
                if (skuInput.value.trim() === '') {
                    skuInput.value = generateSKU();
                }
            });
        });
    </script>
@endsection

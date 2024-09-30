<!DOCTYPE html>
@if(App::getLocale()=='ar')
    <html dir="rtl" lang="ar">
@else
    <html dir="ltr" lang="en">
@endif

<!--begin::Head-->
<head>
    <base href="">
    <title>{{trans('dashboard_trans.Dashboard')}} | @yield('title')</title>
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
    <meta property="og:url" content="https://keenthemes.com/metronic"/>
    <meta property="og:site_name" content="Keenthemes | Metronic"/>
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">


    @if(App::getLocale()=='ar')
        <!--AR files-->
            <link href="{{asset('assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css">

    @else
        <!--EN files-->
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <!--end::Fonts-->

    @yield('style')

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed sidebar-enabled">
<!--begin::loader-->
<div class="page-loader flex-column">
    <img alt="Logo" class="theme-light-show max-h-50px" src="{{asset('assets/media/logos/keenthemes.svg')}}">
    <img alt="Logo" class="theme-dark-show max-h-50px" src="{{asset('assets/media/logos/keenthemes-dark.svg')}}">

    <div class="d-flex align-items-center mt-5">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-muted fs-6 fw-semibold ms-5">Loading...</span>
    </div>
</div>
<!--end::Loader-->
<!--begin::Main-->
<!--begin::Root-->
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
                <!--begin::Logo-->
                <a href="../../demo3/dist/index.html">
                    <img alt="Logo" src="{{asset('assets/media/logos/demo3.svg')}}" class="h-20px logo theme-light-show" />
                    <img alt="Logo" src="{{asset('assets/media/logos/demo3-dark.svg')}}" class="h-20px logo theme-dark-show" />
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside menu-->
            <div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
                <!--begin::Aside Menu-->
                <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto" id="#kt_aside_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div  class="menu-item here">
                            <a class="menu-link active" href="{{ route('dashboard') }}">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
											<span class="svg-icon svg-icon-5">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
													<path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                                <span class="menu-title">{{trans('dashboard_trans.Dashboard')}}</span>
                            </a>
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion "  >
                            <!--begin:Menu link-->
                            <span class="menu-link">
										<span class="menu-icon">
											<i class="ki-duotone ki-black-right fs-2"></i>
										</span>
										<span class="menu-title">{{trans('dashboard_trans.Products')}}</span>
										<span class="menu-arrow"></span>
									</span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-accordion">
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('products.index') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                        <span class="menu-title">{{trans('dashboard_trans.All Products')}}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="{{ route('products.create') }}"  data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                        <span class="menu-title">{{trans('dashboard_trans.Add new products')}}</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="https://preview.keenthemes.com/metronic8/demo3/layout-builder.html" title="Build your layout and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                        <span class="menu-title">Layout Builder</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <div class="menu-item">
                                    <!--begin:Menu link-->
                                    <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" target="_blank">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                        <span class="menu-title">Changelog v8.2.0</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside menu-->
            <!--begin::Footer-->
            <div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
                <!--begin::User panel-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-circle symbol-40px">
                            <img src="assets/media/avatars/300-1.jpg" alt="photo" />
                        </div>
                        <!--end::Avatar-->
                        <!--begin::User info-->
                        <div class="ms-2">
                            <!--begin::Name-->
                            <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1">Paul Melone</a>
                            <!--end::Name-->
                            <!--begin::Major-->
                            <span class="text-muted fw-semibold d-block fs-7 lh-1">Python Dev</span>
                            <!--end::Major-->
                        </div>
                        <!--end::User info-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::User menu-->
                    <div class="ms-1">
                        <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-end">
                            <i class="ki-duotone ki-setting-2 fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--begin::User account menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="assets/media/avatars/300-1.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">Max Smith
                                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">max@kt.com</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo3/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo3/dist/apps/projects/list.html" class="menu-link px-5">
                                    <span class="menu-text">My Projects</span>
                                    <span class="menu-badge">
												<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
											</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                                <a href="#" class="menu-link px-5">
                                    <span class="menu-title">My Subscription</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/account/billing.html" class="menu-link px-5">Billing</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/account/statements.html" class="menu-link px-5">Payments</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="../../demo3/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
                                            <span class="ms-2 lh-0" data-bs-toggle="tooltip" title="View your statements">
													<i class="ki-duotone ki-information-5 fs-5">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
													</i>
												</span></a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content px-3">
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                <span class="form-check-label text-muted fs-7">Notifications</span>
                                            </label>
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo3/dist/account/statements.html" class="menu-link px-5">My Statements</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-end" data-kt-menu-offset="-15px, 0">
                                <a href="#" class="menu-link px-5">
											<span class="menu-title position-relative">{{trans('dashboard_trans.Language')}}
                                                @if (App::getLocale() == 'en')
											<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
											<img class="w-15px h-15px rounded-1 ms-2" src="{{asset('assets/media/flags/united-states.svg')}}" alt="" />
                                            </span>
                                                @else
                                                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">العربية
                                                    <img class="w-15px h-15px rounded-1 ms-2" src="{{asset('assets/media/flags/saudi-arabia.svg')}}" alt="" />
                                            </span>
                                                @endif
                                            </span>

                                </a>
                                <!--begin::Menu sub-->
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <!--begin::Menu item-->
                                    @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                                    <div class="menu-item px-3">
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}" class="menu-link d-flex px-5 active">
												<span class="symbol symbol-20px me-4">
{{--													<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />--}}
												</span>{{ $properties['native'] }}</a>
                                    </div>
                                    @endforeach
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu sub-->
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5 my-1">
                                <a href="../../demo3/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo3/dist/authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Sign Out</a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                    </div>
                    <!--end::User menu-->
                </div>
                <!--end::User panel-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header mt-0 mt-lg-0 pt-lg-0" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
                <!--begin::Container-->
                <div class="container d-flex flex-stack flex-wrap gap-4" id="kt_header_container">
                    <!--begin::Wrapper-->
                    <div class="d-flex d-lg-none align-items-center ms-n3 me-2">
                        <!--begin::Aside mobile toggle-->
                        <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-1 mt-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Aside mobile toggle-->
                        <!--begin::Logo-->
                        <a href="../../demo3/dist/index.html" class="d-flex align-items-center">
                            <img alt="Logo" src="assets/media/logos/demo3.svg" class="theme-light-show h-20px" />
                            <img alt="Logo" src="assets/media/logos/demo3-dark.svg" class="theme-dark-show h-20px" />
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Topbar-->
                    <div class="d-flex align-items-center flex-shrink-0 mb-0 mb-lg-0">
                        <!--begin::Search-->
                        <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-250px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
                            <!--begin::Tablet and mobile search toggle-->
                            <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                                <div class="d-flex btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px">
                                    <i class="ki-duotone ki-magnifier fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <!--end::Tablet and mobile search toggle-->
                            <!--begin::Form(use d-none d-lg-block classes for responsive search)-->
                            <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-2 mb-lg-0" autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden" />
                                <!--end::Hidden input-->
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-magnifier fs-2 text-gray-700 position-absolute top-50 translate-middle-y ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="form-control bg-transparent ps-13 fs-7 h-40px" name="search" value="" placeholder="Quick Search" data-kt-search-element="input" />
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
											<span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
										</span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
											<i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span>
                                <!--end::Reset-->
                            </form>
                            <!--end::Form-->
                            <!--begin::Menu-->
                            <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
                                <!--begin::Wrapper-->
                                <div data-kt-search-element="wrapper">
                                    <!--begin::Recently viewed-->
                                    <div data-kt-search-element="results" class="d-none">
                                        <!--begin::Items-->
                                        <div class="scroll-y mh-200px mh-lg-350px">
                                            <!--begin::Category title-->
                                            <h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">Users</h3>
                                            <!--end::Category title-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
                                                    <img src="assets/media/avatars/300-6.jpg" alt="" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Karina Clark</span>
                                                    <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
                                                    <img src="assets/media/avatars/300-2.jpg" alt="" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Olivia Bold</span>
                                                    <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
                                                    <img src="assets/media/avatars/300-9.jpg" alt="" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Ana Clark</span>
                                                    <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
                                                    <img src="assets/media/avatars/300-14.jpg" alt="" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Nick Pitola</span>
                                                    <span class="fs-7 fw-semibold text-muted">Art Director</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
                                                    <img src="assets/media/avatars/300-11.jpg" alt="" />
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Edward Kulnic</span>
                                                    <span class="fs-7 fw-semibold text-muted">System Administrator</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Category title-->
                                            <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Customers</h3>
                                            <!--end::Category title-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="" />
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Company Rbranding</span>
                                                    <span class="fs-7 fw-semibold text-muted">UI Design</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/tvit.svg" alt="" />
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Company Re-branding</span>
                                                    <span class="fs-7 fw-semibold text-muted">Web Development</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/misc/infography.svg" alt="" />
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Business Analytics App</span>
                                                    <span class="fs-7 fw-semibold text-muted">Administration</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/leaf.svg" alt="" />
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
                                                    <span class="fs-7 fw-semibold text-muted">Marketing</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<img class="w-20px h-20px" src="assets/media/svg/brand-logos/tower.svg" alt="" />
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column justify-content-start fw-semibold">
                                                    <span class="fs-6 fw-semibold">Tower Group Website</span>
                                                    <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Category title-->
                                            <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Projects</h3>
                                            <!--end::Category title-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-notepad fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																	<span class="path5"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
                                                    <span class="fs-7 fw-semibold text-muted">#45670</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-frame fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
                                                    <span class="fs-7 fw-semibold text-muted">#45690</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-message-text-2 fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
                                                    <span class="fs-7 fw-semibold text-muted">#21090</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <a href="#" class="d-flex text-dark text-hover-primary align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-profile-circle fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
                                                    <span class="fs-7 fw-semibold text-muted">#34560</span>
                                                </div>
                                                <!--end::Title-->
                                            </a>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Recently viewed-->
                                    <!--begin::Recently viewed-->
                                    <div class="" data-kt-search-element="main">
                                        <!--begin::Heading-->
                                        <div class="d-flex flex-stack fw-semibold mb-4">
                                            <!--begin::Label-->
                                            <span class="text-muted fs-6 me-2">Recently Searched:</span>
                                            <!--end::Label-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex" data-kt-search-element="toolbar">
                                                <!--begin::Preferences toggle-->
                                                <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2 data-bs-toggle=" title="Show search preferences">
                                                    <i class="ki-duotone ki-setting-2 fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::Preferences toggle-->
                                                <!--begin::Advanced search toggle-->
                                                <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1" data-bs-toggle="tooltip" title="Show more search options">
                                                    <i class="ki-duotone ki-down fs-2"></i>
                                                </div>
                                                <!--end::Advanced search toggle-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Items-->
                                        <div class="scroll-y mh-200px mh-lg-325px">
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-laptop fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp by Keenthemes</a>
                                                    <span class="fs-7 text-muted fw-semibold">#45789</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-simple fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API Project Meeting</a>
                                                    <span class="fs-7 text-muted fw-semibold">#84050</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI Monitoring App Launch</a>
                                                    <span class="fs-7 text-muted fw-semibold">#84250</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-line-down fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project Reference FAQ</a>
                                                    <span class="fs-7 text-muted fw-semibold">#67945</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-sms fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro App Development</a>
                                                    <span class="fs-7 text-muted fw-semibold">#84250</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-bank fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix Mobile App</a>
                                                    <span class="fs-7 text-muted fw-semibold">#45690</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="d-flex align-items-center mb-5">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-40px me-4">
															<span class="symbol-label bg-light">
																<i class="ki-duotone ki-chart-line-down fs-2 text-primary">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing UI Design" Launch</a>
                                                    <span class="fs-7 text-muted fw-semibold">#24005</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Recently viewed-->
                                    <!--begin::Empty-->
                                    <div data-kt-search-element="empty" class="text-center d-none">
                                        <!--begin::Icon-->
                                        <div class="pt-10 pb-10">
                                            <i class="ki-duotone ki-search-list fs-4x opacity-50">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Message-->
                                        <div class="pb-15 fw-semibold">
                                            <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
                                            <div class="text-muted fs-7">Please try again with a different query</div>
                                        </div>
                                        <!--end::Message-->
                                    </div>
                                    <!--end::Empty-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Preferences-->
                                <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
                                    <!--begin::Heading-->
                                    <h3 class="fw-semibold text-dark mb-7">Advanced Search</h3>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="type" value="has" checked="checked" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">All</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="type" value="users" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Users</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="type" value="orders" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Orders</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="type" value="projects" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Projects</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value="" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value="" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <!--begin::Radio group-->
                                        <div class="nav-group nav-group-fluid">
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="attachment" value="has" checked="checked" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">Has attachment</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label>
                                                <input type="radio" class="btn-check" name="attachment" value="any" />
                                                <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">Any</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Radio group-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-5">
                                        <select name="timezone" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="date_period" class="form-select form-select-sm form-select-solid">
                                            <option value="next">Within the next</option>
                                            <option value="last">Within the last</option>
                                            <option value="between">Between</option>
                                            <option value="on">On</option>
                                        </select>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-8">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value="" />
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="Period" class="form-select form-select-sm form-select-solid">
                                                <option value="days">Days</option>
                                                <option value="weeks">Weeks</option>
                                                <option value="months">Months</option>
                                                <option value="years">Years</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
                                        <a href="../../demo3/dist/pages/search/horizontal.html" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Preferences-->
                                <!--begin::Preferences-->
                                <form data-kt-search-element="preferences" class="pt-1 d-none">
                                    <!--begin::Heading-->
                                    <h3 class="fw-semibold text-dark mb-7">Search Preferences</h3>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="pb-4 border-bottom">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Projects</span>
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="py-4 border-bottom">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Targets</span>
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="py-4 border-bottom">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Affiliate Programs</span>
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="py-4 border-bottom">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Referrals</span>
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="py-4 border-bottom">
                                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                            <span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">Users</span>
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </label>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end pt-7">
                                        <button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
                                        <button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Preferences-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Search-->
                        <!--begin::Activities-->
                        <div class="d-flex align-items-center ms-3 ms-lg-4">
                            <!--begin::Drawer toggle-->
                            <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px" id="kt_activities_toggle">
                                <i class="ki-duotone ki-notification-bing fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <!--end::Drawer toggle-->
                        </div>
                        <!--end::Activities-->
                        <!--begin::Chat-->
                        <div class="d-flex align-items-center ms-3 ms-lg-4">
                            <!--begin::Drawer wrapper-->
                            <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px position-relative" id="kt_drawer_chat_toggle">
                                <i class="ki-duotone ki-message-text-2 fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--begin::Bullet-->
                                <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                                <!--end::Bullet-->
                            </div>
                            <!--end::Drawer wrapper-->
                        </div>
                        <!--end::Chat-->
                        <!--begin::Theme mode-->
                        <div class="d-flex align-items-center ms-3 ms-lg-4">
                            <!--begin::Menu toggle-->
                            <a href="#" class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                                <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <!--begin::Menu toggle-->
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-night-day fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
												</span>
                                        <span class="menu-title">Light</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-moon fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                                        <span class="menu-title">Dark</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-screen fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
                                        <span class="menu-title">System</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Theme mode-->
                        <!--begin::Sidebar Toggler-->
                        <div class="d-flex align-items-center d-xxl-none ms-3 ms-lg-4">
                            <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px position-relative" id="kt_sidebar_toggler">
                                <i class="ki-duotone ki-burger-menu-2 fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                            </div>
                        </div>
                        <!--end::Sidebar Toggler-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
          @yield('content')
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container d-flex flex-column flex-md-row flex-stack">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-gray-400 fw-semibold me-1">Created by</span>
                        <a href="https://keenthemes.com" target="_blank" class="text-muted text-hover-primary fw-semibold me-2 fs-6">Keenthemes</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Sidebar-->
        <div id="kt_sidebar" class="sidebar" data-kt-drawer="true" data-kt-drawer-name="sidebar" data-kt-drawer-activate="{default: true, xxl: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'lg': '400px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_sidebar_toggler">
            <!--begin::Sidebar Content-->
            <div class="d-flex flex-column sidebar-body px-5 py-10" id="kt_sidebar_body">
                <!--begin::Sidebar Nav-->
                <ul class="sidebar-nav nav nav-tabs mb-10" id="kt_sidebar_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-kt-countup-tabs="true" href="#kt_sidebar_tab_1">
                            <i class="ki-duotone ki-abstract-36">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-kt-countup-tabs="true" href="#kt_sidebar_tab_2">
                            <i class="ki-duotone ki-abstract-41">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" data-kt-countup-tabs="true" href="#kt_sidebar_tab_3">
                            <i class="ki-duotone ki-abstract-35">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-kt-countup-tabs="true" href="#kt_sidebar_tab_4">
                            <i class="ki-duotone ki-setting-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-kt-countup-tabs="true" href="#kt_sidebar_tab_5">
                            <i class="ki-duotone ki-abstract-25">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </li>
                </ul>
                <!--end::Sidebar Nav-->
                <!--begin::Sidebar Content-->
                <div id="kt_sidebar_content">
                    <div class="hover-scroll-y" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-offset="0px" data-kt-scroll-dependencies="#kt_sidebar_tabs" data-kt-scroll-wrappers="#kt_sidebar_content, #kt_sidebar_body">
                        <!--begin::Tab content-->
                        <div class="tab-content px-5 px-xxl-10">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_sidebar_tab_1" role="tabpanel">
                                <!--begin::Statistics Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Assigned Tasks</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-5">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="100" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Pending</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="210" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Completed</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="10" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">On Hold</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="55" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">In Progress</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Statistics Widget-->
                                <!--begin::Tasks Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Latest Tasks</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b77cca6ef73">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b77cca6ef73" data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-abstract-26 fs-2x text-success">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Project Briefing</a>
                                                <span class="sidebar-text-muted fw-bold">Project Manager</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-pencil fs-2x text-warning">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Concept Design</a>
                                                <span class="sidebar-text-muted fw-bold">Art Director</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-message-text-2 fs-2x text-primary">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Functional Logics</a>
                                                <span class="sidebar-text-muted fw-bold">Lead Developer</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-disconnect fs-2x text-danger">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Development</a>
                                                <span class="sidebar-text-muted fw-bold">DevOps</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-security-user fs-2x text-info">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Testing</a>
                                                <span class="sidebar-text-muted fw-bold">QA Managers</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tasks Widget-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_sidebar_tab_2" role="tabpanel">
                                <!--begin::Statistics Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Customer Orders</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-5">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="40" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">In Process</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="110" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Delivered</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="29" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">On Hold</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="15" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">In Progress</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Statistics Widget-->
                                <!--begin::Best Sellers Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Latest Orders</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
																<i class="ki-duotone ki-information fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-20.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Premium Coffee</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">Arabica Specialty Brand</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-25.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Light Sneakers</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">The Best Lightweight Sneakers</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-24.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Red Boots</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">All Season Boots</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-19.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Wall Decoration</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">Creative & Easy To Install</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-27.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Home Confort</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">Smart Air Purifier</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end::Best Sellers Widget-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_sidebar_tab_3" role="tabpanel">
                                <!--begin::Statistics Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Support Tickets</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-5">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="28" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Pending</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="204" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Completed</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="76" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">On Hold</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="9" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">In Progress</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Statistics Widget-->
                                <!--begin::Best Sellers Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Best Sellers</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                </div>
                                                <!--end::Heading-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
																<i class="ki-duotone ki-information fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span></a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                    <!--end::Input-->
                                                                    <!--end::Label-->
                                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-1.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Spotify App</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">HTML, SASS, Bootstrap</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-2.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Fitnes Drive</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">Angular, Typescript, Bootstrap</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-3.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Taskify App</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">HTML, CSS. jQuery</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-5.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Calendr App</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">React, MangoDb. Node</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <!--begin::Image-->
                                            <div class="symbol symbol-40px symbol-2by3 me-4">
                                                <img src="assets/media/stock/600x400/img-6.jpg" alt="" class="mw-100" />
                                            </div>
                                            <!--end::Image-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                                <a href="#" class="text-white fw-semibold text-hover-primary fs-6">Stocked SaaS</a>
                                                <span class="sidebar-text-muted fw-semibold fs-7 my-1">PHP, Laravel, Oracle</span>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end: Card Body-->
                                </div>
                                <!--end::Best Sellers Widget-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_sidebar_tab_4" role="tabpanel">
                                <!--begin::Statistics Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Notifcations</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-5">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="5" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">System Alert</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="10" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Server Failure</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="40" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">User Feedback</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="3" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Backup</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Statistics Widget-->
                                <!--begin::Tasks Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Latest Tasks</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b77cca6f103">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b77cca6f103" data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-abstract-26 fs-2x text-success">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Project Briefing</a>
                                                <span class="sidebar-text-muted fw-bold">Project Manager</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-pencil fs-2x text-warning">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Concept Design</a>
                                                <span class="sidebar-text-muted fw-bold">Art Director</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-message-text-2 fs-2x text-primary">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Functional Logics</a>
                                                <span class="sidebar-text-muted fw-bold">Lead Developer</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-disconnect fs-2x text-danger">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Development</a>
                                                <span class="sidebar-text-muted fw-bold">DevOps</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-security-user fs-2x text-info">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Testing</a>
                                                <span class="sidebar-text-muted fw-bold">QA Managers</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tasks Widget-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_sidebar_tab_5" role="tabpanel">
                                <!--begin::Statistics Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-10">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Outgoing Emails</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Ticket</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Customer</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <!--begin::Menu item-->
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Admin Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Staff Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Member Group</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">New Contact</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 2-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body">
                                        <!--begin::Row-->
                                        <div class="row g-5">
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="160" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Sending</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="2600" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Sent</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="2500" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Delivered</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-6">
                                                <!--begin::Item-->
                                                <div class="sidebar-border-dashed d-flex flex-column justify-content-center rounded p-3 p-xxl-5">
                                                    <!--begin::Value-->
                                                    <div class="text-white fs-2 fs-xxl-2x fw-bold mb-1" data-kt-countup="true" data-kt-countup-value="11" data-kt-countup-prefix="">0</div>
                                                    <!--begin::Value-->
                                                    <!--begin::Label-->
                                                    <div class="sidebar-text-muted fs-6 fw-bold">Failed</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Statistics Widget-->
                                <!--begin::Tasks Widget-->
                                <div class="card card-flush card-p-0 shadow-none bg-transparent mb-5">
                                    <!--begin::Header-->
                                    <div class="card-header align-items-center border-0">
                                        <!--begin::Title-->
                                        <h3 class="card-title fw-bold text-white fs-3">Latest Tasks</h3>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-icon btn-icon-white btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-category fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b77cca6f148">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Menu separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Form-->
                                                <div class="px-7 py-5">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Status:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div>
                                                            <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b77cca6f148" data-allow-clear="true">
                                                                <option></option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Pending</option>
                                                                <option value="2">In Process</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Member Type:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Options-->
                                                        <div class="d-flex">
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                                <span class="form-check-label">Author</span>
                                                            </label>
                                                            <!--end::Options-->
                                                            <!--begin::Options-->
                                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                                <span class="form-check-label">Customer</span>
                                                            </label>
                                                            <!--end::Options-->
                                                        </div>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <!--begin::Label-->
                                                        <label class="form-label fw-semibold">Notifications:</label>
                                                        <!--end::Label-->
                                                        <!--begin::Switch-->
                                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                            <label class="form-check-label">Enabled</label>
                                                        </div>
                                                        <!--end::Switch-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Actions-->
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                            <!--end::Menu 1-->
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-abstract-26 fs-2x text-success">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Project Briefing</a>
                                                <span class="sidebar-text-muted fw-bold">Project Manager</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-pencil fs-2x text-warning">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Concept Design</a>
                                                <span class="sidebar-text-muted fw-bold">Art Director</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-message-text-2 fs-2x text-primary">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Functional Logics</a>
                                                <span class="sidebar-text-muted fw-bold">Lead Developer</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center mb-7">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-disconnect fs-2x text-danger">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
																<span class="path4"></span>
																<span class="path5"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Development</a>
                                                <span class="sidebar-text-muted fw-bold">DevOps</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-nowrap align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-50px me-5">
														<span class="symbol-label sidebar-bg-muted">
															<i class="ki-duotone ki-security-user fs-2x text-info">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="d-flex flex-column">
                                                <a href="#" class="text-white text-hover-primary fs-6 fw-bold">Testing</a>
                                                <span class="sidebar-text-muted fw-bold">QA Managers</span>
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tasks Widget-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                </div>
                <!--end::Sidebar Content-->
            </div>
            <!--end::Sidebar Content-->
        </div>
        <!--end::Sidebar-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Drawers-->


<!--begin::Modals-->

<!--end::Modals-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->


<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

<!--end::Global Javascript Bundle-->
@yield('script')

</body>

<!--end::Body-->
</html>

@extends('cms.layout.master')
@section('title',trans('dashboard_trans.View User'))
@section('style')
    <meta name="user_id" content="{{$user->id}}">
@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">{{trans('dashboard_trans.View User Details')}}</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Dashboard')}}</li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.User Management')}}</li>
            <li class="breadcrumb-item text-muted">{{trans('dashboard_trans.Users')}}</li>
            <li class="breadcrumb-item text-dark">{{trans('dashboard_trans.View User')}}</li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">{{trans('dashboard_trans.Overview')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">{{trans('dashboard_trans.Security')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_view_overview_events_and_logs_tab">{{trans('dashboard_trans.Events & Logs')}}</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item ms-auto">
                            <!--begin::Action menu-->
                            <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">{{trans('dashboard_trans.Actions')}}
                                <i class="ki-duotone ki-down fs-2 me-0"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link px-5">Create invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link flex-stack px-5">Create payments
                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
														<i class="ki-duotone ki-information fs-7">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i>
													</span></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Apps</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="checked" id="kt_user_menu_notifications" />
                                                    <span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications">Notifications</span>
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-3"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link px-5">Reports</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <a href="#" class="menu-link px-5">Account Settings</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-12">
                                <!--begin::Card header-->
                                <div class="card-header mt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">{{trans('dashboard_trans.General Information')}}</h2>
                                        <div class="fs-6 fw-semibold text-muted"></div>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-light-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">
                                            <i class="ki-duotone ki-brush fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{trans('dashboard_trans.Edit')}}</button>

                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body p-9 pt-4">
                                    <div class="card-body">
                                        <!--begin::Summary-->
                                        <!--begin::User Info-->
                                        <div class="d-flex flex-center flex-column py-5">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-100px symbol-circle mb-7">
                                                <img src="{{asset('images/users/'.$user->avatar)}}" alt="image" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{$user->name}}</a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="mb-9">
                                                <!--begin::Badge-->
                                                <div class="badge badge-lg badge-light-primary d-inline">{{$user->role->name}}</div>
                                                <!--begin::Badge-->
                                            </div>
                                            <!--end::Position-->
                                        </div>
                                        <!--end::User Info-->
                                        <!--end::Summary-->
                                        <!--begin::Details toggle-->
                                        <div class="d-flex flex-stack fs-4 py-3">
                                            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">{{trans('dashboard_trans.Details')}}
                                                <span class="ms-2 rotate-180">
													<i class="ki-duotone ki-down fs-3"></i>
												</span></div>
                                        </div>
                                        <!--end::Details toggle-->
                                        <div class="separator"></div>
                                        <!--begin::Details content-->
                                        <div id="kt_user_view_details" class="collapse show">
                                            <div class="pb-5 fs-6">
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">{{trans('dashboard_trans.Account ID')}}</div>
                                                <div class="text-gray-600">{{$user->id}}</div>
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">{{trans('dashboard_trans.Email')}}</div>
                                                <div class="text-gray-600">
                                                    <a href="#" class="text-gray-600 text-hover-primary">{{$user->email}}</a>
                                                </div>
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">{{trans('dashboard_trans.Gender')}}</div>
                                                @if($user->gender == 'male')
                                                    <div class="text-gray-600">{{trans('dashboard_trans.Male')}}</div>
                                                @else
                                                    <div class="text-gray-600">{{trans('dashboard_trans.Female')}}</div>
                                                @endif
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">{{trans('dashboard_trans.Status')}}</div>
                                                @if($user->status == 'active')
                                                    <div class="text-gray-600">{{trans('dashboard_trans.Active')}}</div>
                                                @else
                                                    <div class="text-danger-600">{{trans('dashboard_trans.InActive')}}</div>
                                                @endif
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bold mt-5">{{trans('dashboard_trans.Last login')}}</div>
                                                <div class="text-gray-600">{{$user->last_login}}</div>
                                                <!--begin::Details item-->
                                            </div>
                                        </div>
                                        <!--end::Details content-->
                                    </div>

                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-12">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>{{trans('dashboard_trans.Profile')}}</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                            <tr>
                                                <td>{{trans('dashboard_trans.Email')}}</td>
                                                <td>{{$user->email}}</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{trans('dashboard_trans.Password')}}</td>
                                                <td>******</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{trans('dashboard_trans.Role')}}</td>
                                                <td>{{$user->role->name}}</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
                                                        <i class="ki-duotone ki-pencil fs-3">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Two Step Authentication</h2>
                                        <div class="fs-6 fw-semibold text-muted">Keep your account extra secure with a second authentication step.</div>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Add-->
                                        <button type="button" class="btn btn-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-fingerprint-scanning fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>Add Authentication Step</button>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_auth_app">Use authenticator app</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_one_time_password">Enable one-time password</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Add-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pb-5">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Content-->
                                        <div class="d-flex flex-column">
                                            <span>SMS</span>
                                            <span class="text-muted fs-6">+61 412 345 678</span>
                                        </div>
                                        <!--end::Content-->
                                        <!--begin::Action-->
                                        <div class="d-flex justify-content-end align-items-center">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5" data-bs-toggle="modal" data-bs-target="#kt_modal_add_one_time_password">
                                                <i class="ki-duotone ki-pencil fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" id="kt_users_delete_two_step">
                                                <i class="ki-duotone ki-trash fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin:Separator-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--end:Separator-->
                                    <!--begin::Disclaimer-->
                                    <div class="text-gray-600">If you lose your mobile device or security key, you can
                                        <a href='#' class="me-1">generate a backup code</a>to sign in to your account.</div>
                                    <!--end::Disclaimer-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->

                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Login Sessions</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
                                            <i class="ki-duotone ki-entrance-right fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Sign out all sessions</button>
                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                            <tr class="text-start text-muted text-uppercase gs-0">
                                                <th class="min-w-100px">Location</th>
                                                <th>Device</th>
                                                <th>IP Address</th>
                                                <th class="min-w-125px">Time</th>
                                                <th class="min-w-70px">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                            <tr>
                                                <td>Australia</td>
                                                <td>Chome - Windows</td>
                                                <td>207.28.31.260</td>
                                                <td>23 seconds ago</td>
                                                <td>Current session</td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>Safari - iOS</td>
                                                <td>207.10.30.79</td>
                                                <td>3 days ago</td>
                                                <td>
                                                    <a href="#" data-kt-users-sign-out="single_user">Sign out</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Australia</td>
                                                <td>Chrome - Windows</td>
                                                <td>207.38.44.70</td>
                                                <td>last week</td>
                                                <td>Expired</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Logs</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <button type="button" class="btn btn-sm btn-light-primary">
                                            <i class="ki-duotone ki-cloud-download fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Download Report</button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-0">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_users_logs">
                                            <tbody>
                                            <tr>
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <td>POST /v1/invoices/in_7229_4615/payment</td>
                                                <td class="pe-0 text-end min-w-200px">10 Nov 2023, 6:43 am</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <td>POST /v1/customer/c_64b77cbec7581/not_found</td>
                                                <td class="pe-0 text-end min-w-200px">22 Sep 2023, 10:30 am</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-danger">500 ERR</div>
                                                </td>
                                                <td>POST /v1/invoice/in_2768_3949/invalid</td>
                                                <td class="pe-0 text-end min-w-200px">10 Mar 2023, 8:43 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-success">200 OK</div>
                                                </td>
                                                <td>POST /v1/invoices/in_2331_8703/payment</td>
                                                <td class="pe-0 text-end min-w-200px">21 Feb 2023, 10:10 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-70px">
                                                    <div class="badge badge-light-warning">404 WRN</div>
                                                </td>
                                                <td>POST /v1/customer/c_64b77cbec7581/not_found</td>
                                                <td class="pe-0 text-end min-w-200px">15 Apr 2023, 8:43 pm</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Events</h2>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        <button type="button" class="btn btn-sm btn-light-primary">
                                            <i class="ki-duotone ki-cloud-download fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Download Report</button>
                                        <!--end::Button-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body py-0">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-5" id="kt_table_customers_events">
                                        <tbody>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#SEP-45656</a>status has changed from
                                                <span class="badge badge-light-warning me-1">Pending</span>to
                                                <span class="badge badge-light-info">In Progress</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2023, 9:23 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
                                                <span class="badge badge-light-succees me-1">In Transit</span>to
                                                <span class="badge badge-light-success">Approved</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2023, 10:30 am</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                                <span class="badge badge-light-info">In Progress</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">10 Mar 2023, 10:10 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
                                                <span class="badge badge-light-succees me-1">In Transit</span>to
                                                <span class="badge badge-light-success">Approved</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2023, 11:30 am</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                                <span class="badge badge-light-info">In Progress</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">15 Apr 2023, 6:43 am</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">
                                                <a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has made payment to
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">20 Jun 2023, 6:43 am</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">
                                                <a href="#" class="text-gray-600 text-hover-primary me-1">Melody Macy</a>has made payment to
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2023, 5:30 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">
                                                <a href="#" class="text-gray-600 text-hover-primary me-1">Sean Bean</a>has made payment to
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2023, 2:40 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">Invoice
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                                <span class="badge badge-light-info">In Progress</span></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2023, 8:43 pm</td>
                                        </tr>
                                        <tr>
                                            <td class="min-w-400px">
                                                <a href="#" class="text-gray-600 text-hover-primary me-1">Sean Bean</a>has made payment to
                                                <a href="#" class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                            <td class="pe-0 text-gray-600 text-end min-w-200px">15 Apr 2023, 11:05 am</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
            <!--begin::Modals-->
            <!--begin::Modal - Update user details-->
            <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <div id="error-messages"></div>
                        <!--begin::Form-->
                        <form class="form" action="" method="POST" enctype="multipart/form-data" id="kt_modal_update_user_form">
                       @method('PUT')
                            @csrf
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_update_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">{{trans('dashboard_trans.Update User Details')}}</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body py-10 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                    <!--begin::User toggle-->
                                    <div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">{{trans('dashboard_trans.User Information')}}
                                        <span class="ms-2 rotate-180">
														<i class="ki-duotone ki-down fs-3"></i>
													</span></div>
                                    <!--end::User toggle-->
                                    <!--begin::User form-->
                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                        <!--begin::Input group-->
                                        <div class="mb-7">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold mb-2">
                                                <span>{{trans('dashboard_trans.Update Image')}}</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg.">
																	<i class="ki-duotone ki-information fs-7">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Image input wrapper-->
                                            <div class="mt-1">
                                                <!--begin::Image placeholder-->
                                                <style>.image-input-placeholder { background-image: url('{{asset('assets/media/svg/avatars/blank.svg')}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{asset('assets/media/svg/avatars/blank-dark.svg')}}'); }</style>
                                                <!--end::Image placeholder-->
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{asset('images/users/'.$user->avatar)}}"></div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Edit-->
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                                        <i class="ki-duotone ki-pencil fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Edit-->
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
                                            </div>
                                            <!--end::Image input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">{{trans('dashboard_trans.Full Name')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="name" id="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{trans('dashboard_trans.Full Name')}}" value="{{$user->name}}" />
                                            <!--end::Input-->
                                            <div id="name-error" class="error-message"></div>
                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">{{trans('dashboard_trans.User Name')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{trans('dashboard_trans.User Name')}}" value="{{$user->user_name}}" />
                                            <!--end::Input-->
                                            <div id="user_name-error" class="error-message"></div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">{{trans('dashboard_trans.Email')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="{{$user->email}}" />
                                            <!--end::Input-->
                                            <div id="email-error" class="error-message"></div>
                                        </div>

                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">{{trans('dashboard_trans.Phone')}}</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="tel" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="{{trans('dashboard_trans.Phone')}}" value="{{$user->phone_number}}" />
                                            <!--end::Input-->
                                            <div id="phone_number-error" class="error-message"></div>

                                        </div>
                                        <!--end::Input group-->
                                        <div class="row fv-row mb-7">

                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">
                                                <span>{{trans('dashboard_trans.Gender')}}:</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"  data-kt-initialized="1"></span>
                                            </label>
                                            <!--end::Label-->
                                            <div class="col-md-9">
                                                <div class="d-flex mt-3">
                                                    <!--begin::Radio-->
                                                    <div class="form-check form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="radio" value="male" @checked($user->gender === 'male') name="gender" id="gender_male" >
                                                        <label class="form-check-label" for="gender_male">{{trans('dashboard_trans.Male')}}</label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" value="female"  @checked($user->gender === 'female') name="gender" id="gender_female">
                                                        <label class="form-check-label" for="gender_female">{{trans('dashboard_trans.Female')}}</label>
                                                    </div>
                                                    <!--end::Radio-->
                                                </div>
                                            </div>
                                            <div id="gender-error" class="error-message"></div>

                                        </div>
                                        <div class="fv-row mb-7">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack">
                                                <!--begin::Label-->
                                                <div class="me-5">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold">{{trans('dashboard_trans.Status')}}: </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <div class="fs-7 fw-semibold text-muted">If you need more info, please check budget planning</div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input" name="status" type="checkbox"  id="status" @checked($user->status == 'active')>
                                                    <!--end::Input-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                            <!--begin::Wrapper-->
                                            <div id="status-error" class="error-message"></div>

                                        </div>
                                        <!--begin::Input group-->
{{--                                        <div class="mb-5">--}}
{{--                                            <!--begin::Label-->--}}
{{--                                            <label class="required fw-semibold fs-6 mb-5">{{trans('dashboard_trans.Role')}}</label>--}}
{{--                                            <!--end::Label-->--}}
{{--                                            <!--begin::Roles-->--}}
{{--                                            <!--begin::Input row-->--}}
{{--                                            @foreach($roles as $role)--}}
{{--                                                <div class="d-flex fv-row">--}}
{{--                                                    <!--begin::Radio-->--}}
{{--                                                    <div class="form-check form-check-custom form-check-solid">--}}
{{--                                                        <!--begin::Input-->--}}
{{--                                                        <input class="form-check-input me-3" name="role_id" type="radio" value="{{$role->id}}" id="kt_modal_update_role_option_0" @checked($user->role_id == $role->id) />--}}
{{--                                                        <!--end::Input-->--}}
{{--                                                        <!--begin::Label-->--}}
{{--                                                        <label class="form-check-label" for="kt_modal_update_role_option_0">--}}
{{--                                                            <div class="fw-bold text-gray-800">{{$role->name}}</div>--}}
{{--                                                            <div class="text-gray-600">{{$role->description}}</div>--}}
{{--                                                        </label>--}}
{{--                                                        <!--end::Label-->--}}
{{--                                                    </div>--}}
{{--                                                    <!--end::Radio-->--}}
{{--                                                </div>--}}
{{--                                                <!--end::Input row-->--}}
{{--                                                <div class='separator separator-dashed my-5'></div>--}}
{{--                                            @endforeach--}}
{{--                                            <!--end::Roles-->--}}
{{--                                            @error('role_id')--}}
{{--                                            <span class="text-danger"> {{ $message }}</span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
                                        <!--end::Input group-->
                                </div>
                                <!--end::Scroll-->
                            </div>
                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">{{trans('dashboard_trans.Close')}}</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" >
                                    <span class="indicator-label">{{trans('dashboard_trans.Submit')}}</span>
                                    <span class="indicator-progress">{{trans('dashboard_trans.Please wait')}}...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Modal - Update user details-->
        </div>

        <!--begin::Modal - Update email-->
        <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">{{trans('dashboard_trans.Update Email Address')}}</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_email_form" method="POST" class="form" action="{{ route('update-email',$user->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!--begin::Notice-->
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <div class="fs-6 text-gray-700">Please note that a valid email address is required to complete the email verification.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--end::Notice-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">{{trans('dashboard_trans.Email')}}</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-solid" placeholder="example@cardio.com" name="email" value="{{$user->email}}" />
                                <!--end::Input-->
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">{{trans('dashboard_trans.Close')}}</button>
                                <button type="submit" class="btn btn-primary" >
                                    <span class="indicator-label">{{trans('dashboard_trans.Submit')}}</span>
                                    <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update email-->
        <!--begin::Modal - Update password-->
        <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Update Password</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_password_form" class="form" method="POST" action="#">
                            @method('PUT')
                            @csrf
                            <!--begin::Input group=-->
                            <div class="fv-row mb-10">
                                <label class="required form-label fs-6 mb-2">Current Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="current_password" autocomplete="off" />
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-semibold fs-6 mb-2">New Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																<i class="ki-duotone ki-eye-slash fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																	<span class="path4"></span>
																</i>
																<i class="ki-duotone ki-eye d-none fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-10">
                                <label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />

                            </div>
                            <!--end::Input group=-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                <button type="submit" class="btn btn-primary"  data-kt-users-modal-action="submit">
                                    <span class="indicator-label" >Submit</span>
                                    <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update password-->
        <!--begin::Modal - Update role-->
        <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Update User Role</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_update_role_form" class="form" action="#">
                            <!--begin::Notice-->
                            <!--begin::Notice-->
                            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                <!--begin::Icon-->
                                <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                                <!--end::Icon-->
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack flex-grow-1">
                                    <!--begin::Content-->
                                    <div class="fw-semibold">
                                        <div class="fs-6 text-gray-700">Please note that reducing a user role rank, that user will lose all priviledges that was assigned to the previous role.</div>
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Notice-->
                            <!--end::Notice-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mb-5">
                                    <span class="required">Select a user role</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input row-->
                                <div class="d-flex">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked='checked' />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_0">
                                            <div class="fw-bold text-gray-800">Administrator</div>
                                            <div class="text-gray-600">Best for business owners and company administrators</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Input row-->
                                <div class="d-flex">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_1">
                                            <div class="fw-bold text-gray-800">Developer</div>
                                            <div class="text-gray-600">Best for developers or people primarily using the API</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Input row-->
                                <div class="d-flex">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_2">
                                            <div class="fw-bold text-gray-800">Analyst</div>
                                            <div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Input row-->
                                <div class="d-flex">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_3">
                                            <div class="fw-bold text-gray-800">Support</div>
                                            <div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                                <div class='separator separator-dashed my-5'></div>
                                <!--begin::Input row-->
                                <div class="d-flex">
                                    <!--begin::Radio-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4" />
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_update_role_option_4">
                                            <div class="fw-bold text-gray-800">Trial</div>
                                            <div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Radio-->
                                </div>
                                <!--end::Input row-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Update role-->
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add Authenticator App</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Content-->
                        <div class="fw-bold d-flex flex-column justify-content-center mb-5">
                            <!--begin::Label-->
                            <div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">Download the
                                <a href="#">Authenticator app</a>, add a new account, then scan this barcode to set up your account.</div>
                            <div class="text-center mb-5 d-none" data-kt-add-auth-action="text-code-label">Download the
                                <a href="#">Authenticator app</a>, add a new account, then enter this code to set up your account.</div>
                            <!--end::Label-->
                            <!--begin::QR code-->
                            <div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
                                <img src="{{asset('assets/media/misc/qr.png')}}" alt="Scan this QR code" />
                            </div>
                            <!--end::QR code-->
                            <!--begin::Text code-->
                            <div class="border rounded p-5 d-flex flex-center d-none" data-kt-add-auth-action="text-code">
                                <div class="fs-1">gi2kdnb54is709j</div>
                            </div>
                            <!--end::Text code-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Action-->
                        <div class="d-flex flex-center">
                            <div class="btn btn-light-primary" data-kt-add-auth-action="text-code-button">Enter code manually</div>
                            <div class="btn btn-light-primary d-none" data-kt-add-auth-action="qr-code-button">Scan barcode instead</div>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->
        <!--begin::Modal - Add task-->
        <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Enable One Time Password</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                            <i class="ki-duotone ki-cross fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form class="form" id="kt_modal_add_one_time_password_form">
                            <!--begin::Label-->
                            <div class="fw-bold mb-9">Enter the new phone number to receive an SMS to when you log in.</div>
                            <!--end::Label-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Mobile number</span>
                                    <span class="ms-2" data-bs-toggle="tooltip" title="A valid mobile number is required to receive the one-time password to validate your account login.">
															<i class="ki-duotone ki-information fs-7">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" name="otp_mobile_number" placeholder="+6123 456 789" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Separator-->
                            <div class="separator saperator-dashed my-5"></div>
                            <!--end::Separator-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-solid" name="otp_email" value="smith@kpmg.com" readonly="readonly" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Confirm password</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="password" class="form-control form-control-solid" name="otp_confirm_password" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancel</button>
                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Add task-->
        <!--end::Modals-->
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/view.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/update-details.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/update-email.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/update-password.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/update-role.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/add-auth-app.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/user-management/users/view/add-one-time-password.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
{{--    <script src="{{asset('/assets/js/axios.js')}}"></script>--}}
@endsection

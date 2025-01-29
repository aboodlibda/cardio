{{--<div class="d-flex">--}}
{{--    @if($row->image)--}}
{{--        <!--begin::Thumbnail-->--}}
{{--        <a href="#" class="symbol symbol-50px">--}}
{{--            <span class="symbol-label" style="background-image:url({{asset('storage/'.$row->image )}});"></span>--}}
{{--        </a>--}}
{{--    @else--}}
{{--        <a href="#" class="symbol symbol-50px">--}}
{{--            <span class="symbol-label" style="background-image:url({{asset('assets/media/svg/files/blank-image.svg' )}});"></span>--}}
{{--        </a>--}}
{{--    @endif--}}
{{--    <!--end::Thumbnail-->--}}
{{--</div>--}}

<div class="text-end" data-category-id="{{ $row->id }}" data-category-name="{{ $row->name }}">
    <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{ __('dashboard_trans.Actions') }}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="{{ route('categories.edit', $row->id) }}" class="menu-link px-3">
                {{ __('dashboard_trans.Edit') }}
            </a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-ecommerce-category-filter="delete_row">
                {{ __('dashboard_trans.Delete') }}
            </a>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
</div>




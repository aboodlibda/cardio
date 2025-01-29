<div class="text-end" data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}">
    <a href="#" class="btn btn-sm btn-light btn-active-light-primary btn-flex btn-center" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        {{ __('dashboard_trans.Actions') }}
        <i class="ki-duotone ki-down fs-5 ms-1"></i>
    </a>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="{{ route('products.edit', $product->id) }}" class="menu-link px-3">
                {{ __('dashboard_trans.Edit') }}
            </a>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                {{ __('dashboard_trans.Delete') }}
            </a>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::Menu-->
</div>




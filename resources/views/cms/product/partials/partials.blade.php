<div class="d-flex align-items-center">
    @if($product->thumbnail)
        <!--begin::Thumbnail-->
        <a href="#" class="symbol symbol-50px">
            <span class="symbol-label" style="background-image:url({{url(Storage::url($product->thumbnail))}});"></span>
        </a>
    @else
        <a href="#" class="symbol symbol-50px">
            <span class="symbol-label" style="background-image:url({{asset('assets/media/svg/files/blank-image.svg')}});"></span>
        </a>
    @endif

    <!--end::Thumbnail-->
    <div class="ms-5">
        <!--begin::Title-->
        <a href="{{ route('products.show',$product->id) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ $product->name }}</a>
        <!--end::Title-->
    </div>
    </div>


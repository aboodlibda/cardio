@if($row->image)
    <!--begin::Thumbnail-->
    <a href="#" class="symbol symbol-50px">
        <span class="symbol-label" style="background-image:url({{Storage::url($row->image)}});" loading="lazy"></span>
    </a>
@else
    <a href="#" class="symbol symbol-50px">
        <span class="symbol-label" style="background-image:url({{asset('assets/media/svg/files/blank-image.svg' )}});"></span>
    </a>
@endif

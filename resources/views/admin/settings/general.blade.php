@extends("layouts.admin.app")
@section("content")
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">{{ __("pages.setting") }}</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item ">
                        <a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="#">{{ __("pages.add") }}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{ __("pages.setting") }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- // Basic Floating Label Form section start -->
<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-9 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title">{{ __("pages.setting") }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route("settings.store") }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row pt-3">
                                <div class="col-12">
                                    <div class="form-label-group">
                                        <input name="app_name" type="text" class="form-control" placeholder="Application Name">
                                        <label for="product_sku_prefix">{{__('pages.app_name')}} <span class="text-danger">*</span></label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group">
                                        <label for="address">{{__('pages.address')}} <span class="text-danger">*</span></label>
                                        <input name="address" id="address" type="text"  class="form-control" placeholder="Address">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group">
                                        <label for="email">{{__("pages.email")}} <span class="text-danger">*</span></label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="{{__("pages.email")}}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group">
                                        <label for="phone">{{__('pages.phone_number')}} <span class="text-danger">*</span></label>
                                        <input name="phone" id="phone" type="text"  class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group">
                                        <label for="app_language">{{__('pages.default_language')}}  <span class="text-danger">*</span></label>
                                        <select name="app_language" class="form-control select2">
                                            @foreach($languages as $language)
                                                <option value="{{$language->iso_code}}">{{$language->language}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group">
                                        <label for="copyright">{{__("pages.copyright")}} <span class="text-danger">*</span></label>
                                        <input name="copyright" id="copyright" type="text"  class="form-control" placeholder="Copyright © ">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="app_logo">{{ __('pages.logo') }}</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="app_logo" id="app_logo" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label for="app_fav_icon">{{ __('pages.favicon') }}</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="app_fav_icon" id="app_fav_icon" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">{{ __('pages.submit') }}</button>
                                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">{{ __('pages.reset') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

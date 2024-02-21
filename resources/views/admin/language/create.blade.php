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
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 rounded-0">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{__('pages.add_language')}}</h6>
                        <a href="{{route('languages.index')}}" class="btn btn-secondary btn-sm rounded-0"> <i class="fa fa-list mr-1"></i> {{__('pages.all_language')}}</a>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{route('languages.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{__('pages.language')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="language" id="language" value="{{old('language')}}" placeholder="{{__('pages.language')}}" class="form-control" aria-describedby="emailHelp" required>
                                        @if ($errors->has('language'))
                                            <div class="error">{{ $errors->first('language') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">{{__('pages.iso_code')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="iso_code" id="iso_code" value="{{old('iso_code')}}" placeholder="{{__('pages.iso_code')}}" class="form-control" aria-describedby="emailHelp">
                                        @if ($errors->has('iso_code'))
                                            <div class="error">{{ $errors->first('iso_code') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group pt-35">
                                        <a href="https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes" target="_blank"><b> <i class="fa fa-list mr-1"></i> ISO Code List</b></a>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="flag" class="custom-file-input" id="customFile" required>
                                            <label class="custom-file-label" for="customFile">Choose Flag</label>
                                            @if ($errors->has('flag'))
                                                <div class="error">{{ $errors->first('flag') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="row justify-content-end">
                                        <div class="col-md-2 pull-right">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">{{__('pages.submit')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
@endsection



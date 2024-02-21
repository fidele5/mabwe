@extends("layouts.admin.app")
@section("content")
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">{{ __("pages.languages") }}</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item ">
                            <a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ __("pages.languages") }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
<!-- Zero configuration table -->
    <!-- Begin Page Content -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __("pages.languages") }}</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <a id="addRow" href="{{ route("languages.create") }}" class="btn btn-primary mb-2 align-items-center">
                                <i class="bx bx-plus"></i>&nbsp; {{ __('pages.add') }}
                            </a>
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                    <tr>
                                        <th width="3%">{{__('pages.sl')}}</th>
                                        <th width="10%">{{__('pages.flag')}}</th>
                                        <th>{{__('pages.country')}}</th>
                                        <th>{{__('pages.iso_code')}}</th>
                                        <th width="15%">{{__('pages.content')}}</th>
                                        <th width="8%">{{__('pages.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($languages as $key => $language)
                                            <tr>
                                                <td width="3%">{{$key + 1}}</td>
                                                <td><img src="{{asset($language->flag)}}" width="40%" class="h-30"></td>
                                                <td>{{$language->language}}</td>
                                                <td width="10%">{{$language->iso_code}}</td>
                                                <td>
                                                    <a href="{{ route('translate',$language->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i> {{__('pages.translate')}}</a>
                                                </td>
                                                <td class="font-14">
                                                    @if($language->iso_code != 'fr')
                                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                            <a href="{{route('languages.edit', $language->id)}}" class="mr-2"><i class="bx bx-edit"></i> </a>
                                                            <a href="{{ route('languages.destroy',$language->id) }}"  class="delete"><i class="bx bx-trash text-danger"></i></a>
                                                        </div>
                                                    @else
                                                    --
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- /.container-fluid -->
@endsection


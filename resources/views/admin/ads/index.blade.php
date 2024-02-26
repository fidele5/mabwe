@extends("layouts.admin.app")
@section("content")
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Publicité</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item ">
                            <a href="{{ route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Publicités
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
<!-- Zero configuration table -->
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Publicités</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Company</th>
                                        <th>Image</th>
                                        <th>Image pour tablette</th>
                                        <th>Lien externe</th>
                                        <th>Expiration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companyAds as $companyAd)
                                        <tr>
                                            <td class="text-truncate" style="max-width: 200px">{{ $companyAd->title }}</td>
                                            <td class="text-truncate" style="max-width: 250px">{{ $companyAd->company->name }}</td>
                                            <td>
                                                <img src="/{{ $companyAd->image_path }}" alt="{{ $companyAd->title }}" height="64" width="64">
                                            </td>
                                            <td>
                                                <img src="/{{ $companyAd->tablet_image }}" alt="{{ $companyAd->title }}" height="64" width="64">
                                            </td>
                                            <td> {{ $companyAd->external_url }}</td>
                                            <td> {{ $companyAd->expire_at }}</td>
                                            <td>
                                                <a href="{{ route("ads.edit", $companyAd) }}">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a class="delete" href="{{ route("ads.destroy", $companyAd) }}">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Company</th>
                                        <th>Image</th>
                                        <th>Image pour tablette</th>
                                        <th>Lien externe</th>
                                        <th>Expiration</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Zero configuration table -->
@endsection

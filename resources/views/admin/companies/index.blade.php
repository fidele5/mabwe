@extends("layouts.admin.app")
@section("content")
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Compagnies</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item ">
                            <a href="{{ route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Compagnies
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
                    <h4 class="card-title">Compagnies</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Addresse</th>
                                        <th>Logo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td class="text-truncate" style="max-width: 200px">{{ $company->name }}</td>
                                            <td class="text-truncate" style="max-width: 250px">{{ $company->description }}</td>
                                            <td>{{ $company->company_type->name }}</td>
                                            <td>{{ $company->phone }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>
                                                <img src="/{{ $company->logo }}" alt="{{ $company->name }}" height="64" width="64">
                                            </td>
                                            <td>
                                                <a href="{{ route("company.edit", $company) }}">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a class="delete" href="{{ route("company.destroy", $company) }}">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Type</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Addresse</th>
                                        <th>Logo</th>
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

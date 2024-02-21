@extends("layouts.admin.app")
@section("content")
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Categories</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('home-admin')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{{ route('categorie-actualites.index')}}">Catégories d'actualités</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Editer
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
                    <h4 class="card-title">Editer une catégorie d'actualités</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route("categorie-actualites.update", $categorie) }}">
                        @csrf
                        @method("patch")
                        <div class="form-body">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" id="designation" class="form-control champ" placeholder="Désignation" name="designation" value="{{ $categorie->designation }}">
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Mettre à jour</button>
                                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Annuler</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic Floating Label Form section end -->
@endsection

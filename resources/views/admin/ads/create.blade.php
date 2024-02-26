@extends("layouts.admin.app")
@section("content")
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Publicité</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{{ route('ads.index') }}">Publicités</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Nouvelle
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- // Basic Floating Label Form section start -->
<section id="floating-label-layouts">
    <div class="row match-height">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title">Nouvelle Pub.</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route("ads.store") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-title-floating">Titre <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <input type="text" value="{{ old('title')}}" id="first-title-floating" class="form-control champ @error('title') is-invalid @enderror" placeholder="Titre" name="title">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Compagnie <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <select name="company_id" id="categorie" class="custom-select champ @error('company_id') is-invalid @enderror">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected="" @endif>{{ $company->name }}</option>
                                                @endforeach
                                                <small class="text-danger"></small>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-title-floating">Durée <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <div class="input-group">
                                                <input type="number" value="{{ old('duration')}}" id="first-title-floating" class="form-control champ @error('duration') is-invalid @enderror" placeholder="Duree d'affichage" name="duration">
                                            
                                                <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Jours</span>
                                                </div>
                                            </div>
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-0">
                                            <label for="first-title-floating">Lien de redirection</label>
                                            <input type="url" id="first-title-floating" class="form-control champ @error('external_url') is-invalid @enderror" placeholder="Url de redirection" name="external_url">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Image  <small class="text-warning text-lowercase text-right" >  <em> 300x250 (Obligatoire) *</em> </small> </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input champ @error('image') is-invalid @enderror" name="image" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                <small class="text-danger"></small>
                                            </div>
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Image tablette  <small class="text-warning text-lowercase text-right" >  <em>200x200 (Obligatoire) *</em> </small> </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input champ @error('image') is-invalid @enderror" name="image_tablet" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                <small class="text-danger"></small>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Enregistrer</button>
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

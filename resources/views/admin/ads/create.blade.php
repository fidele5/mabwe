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
                                            <label for="first-title-floating">Titre</label>
                                            <input type="text" value="{{ old('title')}}" id="first-title-floating" class="form-control champ @error('title') is-invalid @enderror" placeholder="Titre" name="title">
                                            @error('title')
                                                <small>{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Compagnie</label>
                                            <select name="company_id" id="categorie" class="custom-select champ @error('company_id') is-invalid @enderror">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" @if(old('company_id') == $company->id) selected="" @endif>{{ $company->name }}</option>
                                                @endforeach
                                                @error('company_id')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-title-floating">Durée</label>
                                            <div class="input-group">
                                                <input type="url" value="{{ old('video_path')}}" id="first-title-floating" class="form-control champ @error('video_path') is-invalid @enderror" placeholder="Duree d'affichage" name="video_path">
                                            
                                                <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Jours</span>
                                                </div>
                                            </div>
                                            @error('text')
                                                <small class="text-light-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Image  <small class="text-warning text-lowercase text-right" >  <em>{{ __("pages.required") }} *</em> </small> </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input champ @error('image') is-invalid @enderror" name="image" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                @error('image')
                                                    <small class="text-light-danger">{{ $message }}</small>
                                                @enderror
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

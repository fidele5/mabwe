@extends('layouts.admin.app')
@section('content')
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Actualités</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item ">
                            <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item ">
                            <a href="{{ route('company.index') }}">Compagnie</a>
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
            <div class="col-md-9 col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Nouvelle compagnie</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('company.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-title-floating">Nom</label>
                                                <input type="text" value="{{ old('name') }}" id="first-title-floating"
                                                    class="form-control champ @error('name') is-invalid @enderror"
                                                    placeholder="Nom" name="name">
                                                @error('name')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-title-floating">Telephone</label>
                                                <input type="text" value="{{ old('phone') }}" id="first-title-floating"
                                                    class="form-control champ @error('phone') is-invalid @enderror"
                                                    placeholder="Telephone" name="phone">
                                                @error('phone')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-title-floating">Email</label>
                                                <input type="text" value="{{ old('email') }}" id="first-title-floating"
                                                    class="form-control champ @error('email') is-invalid @enderror"
                                                    placeholder="Email" name="email">
                                                @error('email')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Type de compagnie</label>
                                                <select name="company_type_id" id="categorie"
                                                    class="custom-select @error('company_type_id') is-invalid @enderror">
                                                    @foreach ($companyTypes as $companyType)
                                                        <option value="{{ $companyType->id }}"
                                                            @if (old('company_type_id') == $companyType->id) selected="" @endif>
                                                            {{ $companyType->name }}</option>
                                                    @endforeach
                                                    @error('company_type_id')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group mb-0">
                                                <label for="textarea-counter">Description</label>
                                                <textarea data-length=20 class="form-control char-textarea champ @error('description') is-invalid @enderror"
                                                    id="textarea-counter" rows="5" name="description" placeholder="Texte">{{ old('description') }}</textarea>
                                                @error('text')
                                                    <small class="text-light-danger">{{ $message }}</small>
                                                @enderror
                                            </fieldset>
                                            <small class="counter-value float-right"><span class="char-count">0</span> / 20
                                            </small>
                                        </div>

                                        <div class="col-12">
                                            <fieldset class="form-group mb-0">
                                                <label for="textarea-counter">Adresse</label>
                                                <textarea data-length=20 class="form-control char-textarea champ @error('address') is-invalid @enderror"
                                                    id="textarea-counter" rows="5" name="address" placeholder="Adresse">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <small class="text-light-danger">{{ $message }}</small>
                                                @enderror
                                            </fieldset>
                                            <small class="counter-value float-right"><span class="char-count">0</span> / 20
                                            </small>
                                        </div>

                                        <div class="col-md-12">
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">Logo <small
                                                        class="text-warning text-lowercase text-right">
                                                        <em>{{ __('pages.required') }} *</em> </small> </label>
                                                <div class="custom-file">
                                                    <input type="file" value="{{ old('logo') }}"
                                                        class="custom-file-input champ @error('logo') is-invalid @enderror"
                                                        name="logo" id="inputGroupFile01" multiple>
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                    @error('logo')
                                                        <small class="text-light-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-12 form-group file-repeater">
                                            <label for="textarea-counter">Images</label>

                                            <div data-repeater-list="repeater_list">
                                                <div data-repeater-item="">
                                                    <div class="row mb-2">

                                                        <div class="col-8 col-lg-8 mb-1">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input champ"
                                                                    name="file" id="inputGroupFile01">
                                                                <label class="custom-file-label"
                                                                    for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-2 col-lg-2 text-lg-right">
                                                            <button class="btn btn-icon btn-danger" type="button"
                                                                data-repeater-delete="">
                                                                <i class="bx bx-trash"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col form-group p-0">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button class="btn btn-primary mr-1 mb-1" data-repeater-create=""
                                                                type="button">
                                                        Ajouter une image
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-primary mr-1 mb-1">Enregistrer</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary mr-1 mb-1">Annuler</button>
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
    </section>
    <!-- // Basic Floating Label Form section end -->
@endsection

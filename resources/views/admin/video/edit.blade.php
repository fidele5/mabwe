@extends("layouts.admin.app")
@section("content")
<div class="content-header-left col-12 mb-2 mt-1">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Post</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item ">
                        <a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item ">
                        <a href="{{ route('post.index') }}">{{ $videoPost->title }}</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Modifier
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
                    <h4 class="card-title">Modifier la video</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route("video-post.update", $videoPost->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("patch")
                            <div class="form-body">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-title-floating">Titre <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <input type="text" id="first-title-floating" class="form-control champ @error('title') is-invalid @enderror" placeholder="Titre" value="{{ $videoPost->title }}" name="title">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Catégorie <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <select name="post_category_id" id="categorie" class="custom-select @error('post_category_id') is-invalid @enderror">
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}" @if($videoPost->post_category_id == $categorie->id) selected="" @endif>{{ $categorie->name }}</option>
                                                @endforeach
                                                <small class="text-danger"></small>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-0">
                                            <label for="first-title-floating">Url <small class="text-warning text-lowercase text-right" >  <em> (Obligatoire) *</em></small></label>
                                            <input type="url" value="{{ $videoPost->video_path }}" id="first-title-floating" class="form-control champ @error('video_path') is-invalid @enderror" placeholder="Uri de la video" name="video_path">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Caption <small class="text-warning text-lowercase text-right" >  <em>270 x 200 (Obligatoire) *</em> </small> </label>
                                            <div class="custom-file">
                                                <input type="file" value="{{ $videoPost->caption }}" class="custom-file-input @error('caption') is-invalid @enderror" name="caption" id="inputGroupFile01">
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

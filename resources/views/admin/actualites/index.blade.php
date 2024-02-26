@extends("layouts.admin.app")
@section("content")
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h5 class="content-header-title float-left pr-1 mb-0">Actualité</h5>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb p-0 mb-0">
                        <li class="breadcrumb-item ">
                            <a href="{{ route('home')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            Actualités
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
                    <h4 class="card-title">Actualités</h4>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Categorie</th>
                                        <th>Vues</th>
                                        <th>Commentaires</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="text-truncate" style="max-width: 200px">{{ $post->title }}</td>
                                            <td class="text-truncate" style="max-width: 250px">{{ $post->text }}</td>
                                            <td>{{ $post->post_category->name }}</td>
                                            <td>{{ $post->views ? $post->views : 0 }}</td>
                                            <td>{{ $post->comments->count() }}</td>
                                            <td>
                                                <a href="{{ route("post.edit", $post) }}">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <a class="delete" href="{{ route("post.destroy", $post) }}">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                                <a href="{{ route("single", $post) }}">
                                                    <i class="bx bx-show"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Contenu</th>
                                        <th>Categorie</th>
                                        <th>Vues</th>
                                        <th>Commentaires</th>
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

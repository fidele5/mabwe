@extends('layouts.front.app')
@section('content')
    <section class="block-wrapper">
        <div class="container">
            <!-- block content -->
            <div class="block-content non-sidebar">
                <!-- grid box -->
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="world">{{ $companyType->name }} </span></h1>
                    </div>

                    @if ($companies->count())    
                        <div class="row">
                            @foreach ($companies as $company)
                                <div class="col-md-4">
                                    <div class="news-post standard-post2">
                                        <div class="post-gallery">
                                            <img src="/{{ $company->logo }}" alt="">
                                            <a class="category-post world" href="{{ route("companies", $company->company_type_id) }}">{{ $company->company_type->name}}</a>
                                        </div>
                                        <div class="post-title">
                                            <h2><a href="{{ route("company", $company) }}">{{ $company->name }}</a></h2>
                                        </div>
                                        <div class="post-content">
                                            <p>{{ \Str::limit($company->description, 150, "...") }}</p>
                                            <a href="{{ route("company", $company) }}" class="read-more-button"><i
                                                    class="fa fa-arrow-circle-right"></i>Lire plus</a>
                                        </div>
                                    </div>
                                </div>    
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-primary" role="alert">
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Aucun contenu ajouté pour le moment sur les {{ $companyType->name }}
                        </div>
                    @endif
                </div>
                <!-- End grid box -->

                <!-- google addsense -->
                <div class="advertisement">
                    <div class="desktop-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/728x90-white.jpg" alt="">
                    </div>
                    <div class="tablet-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/468x60-white.jpg" alt="">
                    </div>
                    <div class="mobile-advert">
                        <span>Advertisement</span>
                        <img src="upload/addsense/300x250.jpg" alt="">
                    </div>
                </div>
                <!-- End google addsense -->

                <!-- pagination box -->

        
                <!-- End Pagination box -->

            </div>
            <!-- End block content -->
        </div>
    </section>
@endsection

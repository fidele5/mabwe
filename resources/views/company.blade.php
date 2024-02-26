@extends('layouts.front.app')
@section('content')
    <div class="rts-project-details-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <div class="big-bg-porduct-details">
                        <img src="/assets/images/portfolio/bg-lg-01.jpg" alt="Business_Finbiz">
                        <div class="project-info sal-animate" data-sal-delay="250" data-sal="slide-up"
                            data-sal-duration="800">
                            <div class="info-head">
                                <h5 class="title"> {{ $company->company_type->name }} : {{ $company->name }}</h5>
                            </div>
                            <div class="info-body">
                                <!-- end single info -->
                                <!-- single info -->
                                <div class="single-info">
                                    <div class="info-ico">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </div>
                                    <div class="info-details">
                                        <span>Email:</span>
                                        <h6 class="name">{{ $company->email }}</h6>
                                    </div>
                                </div>
                                <!-- end single info -->
                                <!-- single info -->
                                <div class="single-info">
                                    <div class="info-ico">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="info-details">
                                        <span>Telephone:</span>
                                        <h6 class="name">{{ $company->phone }}</h6>
                                    </div>
                                </div>
                                <!-- end single info -->
                                <!-- single info -->
                                <div class="single-info">
                                    <div class="info-ico">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info-details">
                                        <span>Addresse:</span>
                                        <h6 class="name">{{ $company->address }}</h6>
                                    </div>
                                </div>
                                <!-- end single info -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt--70 mb--50">
                <div class="col-12">
                    <div class="product-details-main-inner">
                        <span data-sal-delay="150" data-sal="slide-up" data-sal-duration="800"
                            class="sal-animate">Description</span>
                        <h3 class="title animated fadeIn sal-animate" data-sal-delay="250" data-sal="slide-up"
                            data-sal-duration="800">{{ $company->company_type->name }} : {{ $company->name }}</h3>
                        <p class="disc sal-animate" data-sal-delay="350" data-sal="slide-up" data-sal-duration="800">
                            {{ $company->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row g-5 mb--60">
                @foreach ($company->images as $image)
                    <div class="col-lg-4 sal-animate" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="thumbnail">
                            <img src="/{{ $image->image_path }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

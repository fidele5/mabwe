@extends('layouts.front.app')
@section('content')
    <section class="block-wrapper">
        <div class="container">
            <!-- block content -->
            <div class="block-content non-sidebar">
                <!-- grid box -->
                <div class="grid-box">
                    <div class="title-section">
                        <h1><span class="world">{{ $postCategory->name }} posts</span></h1>
                    </div>

                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-md-4">
                                <div class="news-post standard-post2">
                                    <div class="post-gallery">
                                        <img src="/{{ $post->image }}" alt="">
                                        <a class="category-post world"
                                            href="{{ route('category', $post->post_category_id) }}">{{ $post->post_category->name }}</a>
                                    </div>
                                    <div class="post-title">
                                        <h2><a href="{{ route('single', $post) }}">{{ $post->title }}</a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</li>
                                            <li><i class="fa fa-user"></i>Par <a href="#">{{ $post->user->name }}</a>
                                            </li>
                                            <li><a href="{{ route('single', $post) }}#comments"><i
                                                        class="fa fa-comments-o"></i><span>{{ count($post->comments) }}</span></a>
                                            </li>
                                            <li><i class="fa fa-eye"></i>{{ $post->views }}</li>
                                        </ul>
                                    </div>
                                    <div class="post-content">
                                        <p>{{ \Str::limit($post->text, 150, '...') }}</p>
                                        <a href="{{ route('single', $post) }}" class="read-more-button"><i
                                                class="fa fa-arrow-circle-right"></i>Lire plus</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End grid box -->

                <!-- google addsense -->
                @if (get_ads()->count())
                    <div class="advertisement">
                        <div class="desktop-advert">
                            <span>{{ get_random_ad()['title'] }}</span>
                            <img src="/{{ get_random_ad()['landscape_desktop'] }}" alt="">
                        </div>
                        <div class="tablet-advert">
                            <span>{{ get_random_ad()['title'] }}</span>
                            <img src="/{{ get_random_ad()['landscape_tablet'] }}" alt="">
                        </div>
                        <div class="mobile-advert">
                            <span>{{ get_random_ad()['title'] }}</span>
                            <img src="/{{ get_random_ad()['landscape_mobile'] }}" alt="">
                        </div>
                    </div>
                @endif
                <!-- End google addsense -->

                <!-- pagination box -->

                {{ $posts->links('vendor.pagination.default') }}


                <!-- End Pagination box -->

            </div>
            <!-- End block content -->
        </div>
    </section>
@endsection

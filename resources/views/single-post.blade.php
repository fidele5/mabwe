@extends('layouts.front.app')
@section('content')
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- single-post box -->
                    <div class="single-post-box">

                        <div class="title-post">
                            <h1>{{ $post->title }}</h1>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</li>
                                <li><i class="fa fa-user"></i>Par <a href="#">{{ $post->user->name }}</a></li>
                                <li><a href="#"><i class="fa fa-comments-o"></i><span>{{ $post->comments_count }}</span></a></li>
                                <li><i class="fa fa-eye"></i>{{ $post->views }}</li>
                            </ul>
                        </div>

                        <div class="post-gallery">
                            <img src="/{{ $post->image }}" alt="">
                            <span class="image-caption">{{ $post->post_category->name }}</span>
                        </div>

                        <div class="post-content">
                            <p>
                                {{ $post->text }}
                            </p>
                        </div>

                        <div class="post-tags-box">
                            <ul class="tags-box">
                                <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route("category", $category) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="share-post-box">
                            <ul class="share-box">
                                <li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Facebook</a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i>Share on Twitter</a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i><span></span></a></li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i><span></span></a></li>
                            </ul>
                        </div>

                        <div class="about-more-autor">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#about-autor" data-toggle="tab" aria-expanded="true">About The Autor</a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="about-autor">
                                    <div class="autor-box">
                                        <img src="/images/ico.jpeg" alt="">
                                        <div class="autor-content">
                                            <div class="autor-title">
                                                <h1><span>{{ $post->user->name }}</span><a href="autor-details.html">{{ count($post->user->posts) }} posts</a></h1>
                                                <ul class="autor-social">
                                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                                                </ul>
                                            </div>
                                            <p>
                                                {{ $post->user->bio }} 
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- carousel box -->
                        <div class="carousel-box owl-wrapper">
                            <div class="title-section">
                                <h1><span>Vous pourriez aussi aimer</span></h1>
                            </div>
                            <div class="owl-carousel owl-theme" data-num="3" style="opacity: 1; display: block;">
                            
                                <div class="owl-wrapper-outer">
                                    <div class="owl-wrapper" style="width: 2530px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-506px, 0px, 0px);">
                                        @foreach($relatedNews as $news)
                                            <div class="owl-item" style="width: 253px;">
                                                <div class="item news-post image-post3">
                                                    <img src="/{{ $news->image }}" alt="">
                                                    <div class="hover-box">
                                                        <h2><a href="{{ route('single', $news) }}">{{ $news->title }}</a></h2>
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-clock-o"></i>{{ $news->created_at->diffForHumans() }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-controls clickable">
                                    <div class="owl-pagination">
                                        <div class="owl-page">
                                            <span class=""></span>
                                        </div>
                                        <div class="owl-page active">
                                            <span class=""></span>
                                        </div>
                                    </div>
                                    <div class="owl-buttons">
                                        <div class="owl-prev"></div>
                                        <div class="owl-next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End carousel box -->

                        <div class="comment-area-box">
                            <div class="title-section">
                                <h1><span>{{ $post->comments_count }} Commentaires</span></h1>
                            </div>
                            <ul class="comment-tree">
                                @foreach ($comments as $comment)    
                                    <li>
                                        <div class="comment-box">
                                            <img alt="" src="/images/ico.jpeg">
                                            <div class="comment-content">
                                                <h4>{{ $comment->username }}</h4>
                                                <span><i class="fa fa-clock-o"></i>{{ $comment->created_at->diffForHumans() }}</span>
                                                <p>{{ $comment->text }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- contact form box -->
                        <div class="contact-form-box">
                            <div class="title-section">
                                <h1><span>Laissez nous un commentaire</span> <span class="email-not-published">Votre adresse email ne sera pas pulbié.</span></h1>
                            </div>
                            <form id="comment-form" method="POST" action="{{ route("comment") }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name">Nom*</label>
                                        <input id="name" name="name" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mail">E-mail*</label>
                                        <input id="mail" name="mail" type="text">
                                    </div>
                                </div>
                                <label for="comment">Votre commentaire*</label>
                                <textarea id="comment" name="comment"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button type="submit" id="submit-contact">
                                    <i class="fa fa-comment"></i> Poster le commentaire
                                </button>
                            </form>
                        </div>
                        <!-- End contact form box -->

                    </div>
                    <!-- End single-post box -->

                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">

                    <div class="widget social-widget">
                        <div class="title-section">
                            <h1><span>Restez-connecté</span></h1>
                        </div>
                        <ul class="social-share">
                            <li>
                                <a href="#" class="rss"><i class="fa fa-rss"></i></a>
                                <span class="number">9,455</span>
                                <span>Souscriptions</span>
                            </li>
                            <li>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <span class="number">56,743</span>
                                <span>Fans</span>
                            </li>
                            <li>
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <span class="number">43,501</span>
                                <span>Suivis</span>
                            </li>
                            <li>
                                <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                                <span class="number">35,003</span>
                                <span>Suivis</span>
                            </li>
                        </ul>
                    </div>

                    <div class="widget tab-posts-widget">

                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="#option1" data-toggle="tab">Les plus populaires</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="option1">
                                <ul class="list-posts">
                                    @foreach($popularNews as $news)
                                        <li>
                                            <img src="/{{ $news->image }}" alt="">
                                            <div class="post-content">
                                                <h2><a href="{{ route('single', $news) }}">{{ $news->title }}</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>{{ $news->created_at->diffForHumans() }}</li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget subscribe-widget">
                        <form class="subscribe-form">
                            <h1>Souscrire à notre journal</h1>
                            <input type="text" name="sumbscribe" id="subscribe" placeholder="Email">
                            <button id="submit-subscribe">
                                <i class="fa fa-arrow-circle-right"></i>
                            </button>
                            <p>Recevoir toutes les actualités par mail.</p>
                        </form>
                    </div>

                    <div class="widget tags-widget">

                        <div class="title-section">
                            <h1><span>Categories</span></h1>
                        </div>

                        <ul class="tag-list">
                            @foreach ($categories as $category)
                                <li><a href="{{ route("category", $category) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="advertisement">
                        <div class="desktop-advert">
                            <span>Advertisement</span>
                            <img src="upload/addsense/300x250.jpg" alt="">
                        </div>
                        <div class="tablet-advert">
                            <span>Advertisement</span>
                            <img src="upload/addsense/200x200.jpg" alt="">
                        </div>
                        <div class="mobile-advert">
                            <span>Advertisement</span>
                            <img src="upload/addsense/300x250.jpg" alt="">
                        </div>
                    </div>

                </div>
                <!-- End sidebar -->

            </div>

        </div>

    </div>
</section>
@endsection

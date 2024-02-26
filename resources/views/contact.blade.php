@extends('layouts.front.app')
@section('content')
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <!-- block content -->
                    <div class="block-content">

                        <!-- contact form box -->
                        <div class="contact-form-box">
                            <div class="title-section">
                                <h1><span>Laissez nous un message</span></h1>
                            </div>
                            <form id="contact-form">
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
                                <label for="comment">Your Message*</label>
                                <textarea id="comment" name="comment"></textarea>
                                <button type="submit" id="submit-contact">
                                    <i class="fa fa-paper-plane"></i> Send Message
                                </button>
                            </form>
                        </div>
                        <!-- End contact form box -->

                    </div>
                    <!-- End block content -->

                </div>

                <div class="col-sm-4">

                    <!-- sidebar -->
                    <div class="sidebar">

                        <div class="widget tab-posts-widget">

                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active">
                                    <a href="#option1" data-toggle="tab">Posts populaires</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="option1">
                                    <ul class="list-posts">
                                        @foreach ($popularNews as $post)
                                            <li>
                                                <img src="/{{ $post->image }}" alt="">
                                                <div class="post-content">
                                                    <h2><a href="{{ route('single', $post) }}">{{ $post->title }}</a></h2>
                                                    <ul class="post-tags">
                                                        <li><i
                                                                class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}
                                                        </li>
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
                                <input type="text" name="sumbscribe" id="subscribe" placeholder="Email" />
                                <button id="submit-subscribe">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </button>
                                <p>Recevoir les nouvelles par mail.</p>
                            </form>
                        </div>

                        <div class="widget tags-widget">

                            <div class="title-section">
                                <h1><span>Popular Tags</span></h1>
                            </div>

                            <ul class="tag-list">
                                @foreach (get_categories() as $category)
                                    <li><a href="{{ route('category', $category) }}">News</a></li>
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

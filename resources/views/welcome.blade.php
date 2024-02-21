@extends("layouts.front.app")
@section("content")
<!-- heading-news-section2
   ================================================== -->
<section class="heading-news2">

    <div class="container">

        <div class="ticker-news-box">
            <span class="breaking-news">breaking news</span>
            <ul id="js-news">
                @foreach ($breakingNews as $post)    
                    <li class="news-item"><span class="time-news">11:36 pm</span> <a href="#">Lorem ipsum dolor sit amet,
                            consectetuer adipiscing elit.</a> Donec odio. Quisque volutpat mattis eros... </li>
                @endforeach
            </ul>
        </div>

        <div class="iso-call heading-news-box">
            @if (count($posts))    
                <div class="image-slider snd-size">
                    <span class="top-stories">Nouveautés</span>
                    <ul class="bxslider">
                        @foreach ($posts as $post)    
                            <li>
                                <div class="news-post image-post">
                                    <img src="upload/news-posts/h7.jpg" alt="">
                                    <div class="hover-box">
                                        <div class="inner-hover">
                                            <a class="category-post sport" href="sport.html">Sport</a>
                                            <h2><a href="single-post.html">Phasellus ultrices nulla quis nibh. Quisque a lectus.
                                                </a></h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                                                <li><i class="fa fa-eye"></i>872</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($breakingNews as $post)
                <div class="news-post image-post {{ $loop->first ? 'default-size' : '' }}">
                    <img src="upload/news-posts/h1.jpg" alt="">
                    <div class="hover-box">
                        <div class="inner-hover">
                            <a class="category-post travel" href="travel.html">travel</a>
                            <h2><a href="single-post.html">Lorem ipsum dolor sit amet, consectetuer</a></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i><span>27 may 2013</span></li>
                                <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a></li>
                            </ul>
                            <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>
<!-- End heading-news-section -->

<!-- block-wrapper-section
                ================================================== -->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <!-- block content -->
                <div class="block-content">

                    <!-- grid box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span>Today's Featured</span></h1>
                        </div>

                        <div class="row">
                            @if (count($mostLikedPost))    
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/im5.jpg" alt="">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post tech" href="tech.html">Tech</a>
                                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                                            pharetra a, ultricies in, diam. </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                        <li><i class="fa fa-user"></i>by <a href="#">John Doe</a>
                                                        </li>
                                                        <li><a href="#"><i
                                                                    class="fa fa-comments-o"></i><span>23</span></a></li>
                                                        <li><i class="fa fa-eye"></i>872</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-posts">
                                        @foreach ($mostLikedPost[0]->posts as $post)    
                                            <li>
                                                <img src="upload/news-posts/list1.jpg" alt="">
                                                <div class="post-content">
                                                    <a href="travel.html">travel</a>
                                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra
                                                            a, ultricies in, diam. </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @if (count($mostLikedPost))
                                <div class="col-md-6">
                                    <div class="news-post image-post2">
                                        <div class="post-gallery">
                                            <img src="upload/news-posts/im6.jpg" alt="">
                                            <div class="hover-box">
                                                <div class="inner-hover">
                                                    <a class="category-post travel" href="travel.html">travel</a>
                                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in,
                                                            pharetra a, ultricies in, diam. </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                        <li><i class="fa fa-user"></i>by <a href="#">John Doe</a>
                                                        </li>
                                                        <li><a href="#"><i
                                                                    class="fa fa-comments-o"></i><span>23</span></a></li>
                                                        <li><i class="fa fa-eye"></i>872</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-posts">
                                        @foreach ($mostLikedPost[1] as $post)    
                                            <li>
                                                <img src="upload/news-posts/list4.jpg" alt="">
                                                <div class="post-content">
                                                    <a href="travel.html">travel</a>
                                                    <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra
                                                            a, ultricies in, diam. </a></h2>
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="center-button">
                            <a href="#"><i class="fa fa-refresh"></i> More from featured</a>
                        </div>

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

                    <!-- grid-box -->
                    <div class="grid-box">

                        <div class="title-section">
                            <h1><span class="world">News in Video</span></h1>
                        </div>

                        <div class="row">
                            @foreach ($videoPosts as $videoPost)    
                                <div class="col-md-4">
                                    <div class="news-post video-post">
                                        <img alt="" src="upload/news-posts/video1.jpg">
                                        <a href="https://www.youtube.com/watch?v=LL59es7iy8Q" class="video-link"><i
                                                class="fa fa-play-circle-o"></i></a>
                                        <div class="hover-box">
                                            <h2><a href="single-post.html">Donec odio. Quisque volutpat mattis eros.</a>
                                            </h2>
                                            <ul class="post-tags">
                                                <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End grid-box -->

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

                    <!-- article box -->
                    <div class="article-box">

                        <div class="title-section">
                            <h1><span>Derniers articles</span></h1>
                        </div>

                        @if (count($posts))
                            @foreach ($posts as $post)    
                                <div class="news-post article-post">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="post-gallery">
                                                <img alt="" src="upload/news-posts/art1.jpg">
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra a,
                                                        ultricies in, diam. Sed arcu. Cras consequat.</a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                    <li><i class="fa fa-user"></i>by <a href="#">John Doe</a></li>
                                                    <li><a href="#"><i class="fa fa-comments-o"></i><span>23</span></a>
                                                    </li>
                                                    <li><i class="fa fa-eye"></i>872</li>
                                                </ul>
                                                <p>Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper
                                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                                    Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.
                                                </p>
                                                <a href="single-post.html" class="read-more-button"><i
                                                        class="fa fa-arrow-circle-right"></i>Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <!-- End article box -->

                    <!-- pagination box -->
                    @if (count($posts))
                        <div class="pagination-box">
                            <ul class="pagination-list">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><span>...</span></li>
                                <li><a href="#">9</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                            <p>Page 1 of 9</p>
                        </div>
                    @endif
                    <!-- End Pagination box -->

                </div>
                <!-- End block content -->

            </div>

            <div class="col-sm-4">

                <!-- sidebar -->
                <div class="sidebar">

                    <div class="widget social-widget">
                        <div class="title-section">
                            <h1><span>Restez connecté</span></h1>
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
                                <a href="#option1" data-toggle="tab">Posts populaires</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="option1">
                                <ul class="list-posts">
                                    @foreach ($popularNews as $post)    
                                        <li>
                                            <img src="upload/news-posts/listw1.jpg" alt="">
                                            <div class="post-content">
                                                <h2><a href="single-post.html">Pellentesque odio nisi, euismod in, pharetra
                                                        a, ultricies in, diam. </a></h2>
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget recent-comments-widget">
                        <div class="title-section">
                            <h1><span>Commentaires recents</span></h1>
                        </div>
                        <div class="owl-wrapper">
                            <div class="owl-carousel" data-num="1">
                                <div class="item">
                                    <ul class="comment-list">
                                        @foreach ($todayComments as $comment)    
                                            <li>
                                                <img src="upload/news-posts/avatar1.jpg" alt="">
                                                <div class="comment-content">
                                                    <p class="main-message">
                                                        Donec nec justo eget felis fermentum. Aliquam porttitor mauris sit
                                                        amet orci. Aenean dignissim pellentesque felis.
                                                    </p>
                                                    <p>Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                                    </p>
                                                    <span><i class="fa fa-user"></i>by John Doe</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="item">
                                    <ul class="comment-list">
                                        @foreach ($recentComments as $comment)    
                                            <li>
                                                <img src="upload/news-posts/avatar3.jpg" alt="">
                                                <div class="comment-content">
                                                    <p class="main-message">
                                                        Morbi in sem quis dui placerat ornare. Pellentesque odio nisi,
                                                        euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras
                                                        consequat.
                                                    </p>
                                                    <p>Aliquam porttitor mauris sit amet orci. </p>
                                                    <span><i class="fa fa-user"></i>by John Doe</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
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

                    {{-- <div class="advertisement">
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
                    </div> --}}

                </div>
                <!-- End sidebar -->

            </div>

        </div>

    </div>
</section>
<!-- End block-wrapper-section -->
@endsection
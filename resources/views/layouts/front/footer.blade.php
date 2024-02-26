<!-- footer
   ================================================== -->
<footer>
    <div class="container">
        <div class="footer-widgets-part">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget text-widget">
                        <h1>A propos de nous</h1>
                        <p>Nous sommes une entreprise de communication </p>
                        <p>Nous propulsons les entreprises a un niveau exeptionnel</p>
                    </div>
                    <div class="widget social-widget">
                        <h1>Restez avec nous</h1>
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="vimeo"><i class="fa fa-vimeo-square"></i></a></li>
                            <li><a href="#" class="dribble"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" class="flickr"><i class="fa fa-flickr"></i></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget posts-widget">
                        <h1>Dernieres actualites</h1>
                        <ul class="list-posts">
                            @foreach (get_lastest_news() as $post)    
                                <li>
                                    <img src="/{{ $post->image }}" alt="">
                                    <div class="post-content">
                                        <a href="{{ route("category", $post->post_category_id) }}">{{ $post->post_category->name }}</a>
                                        <h2><a href="{{ route("single", $post) }}">{{ $post->title }}</a></h2>
                                        <ul class="post-tags">
                                            <li><i class="fa fa-clock-o"></i>{{ $post->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget categories-widget">
                        <h1>Categories</h1>
                        <ul class="category-list">
                            @foreach (get_categories() as $category)    
                                <li>
                                    <a href="{{ route("category", $category) }}">{{ $category->name }} <span>{{ $category->posts->count() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-last-line">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; COPYRIGHT {{ date('Y') }} Mabwe</p>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="/">Acceuil</a></li>
                            <li><a href="{{ route("posts") }}">Actualités</a></li>
                            <li><a href="{{ route("about") }}">Apropos de nous</a></li>
                            <li><a href="{{ route("contact") }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer -->

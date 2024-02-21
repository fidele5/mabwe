<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\VideoPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function welcome()  {
        $posts = Post::with("post_category", "user")
            ->withCount("comments")
            ->take(4)
            ->orderBy("id", "DESC")
            ->get();

        $categories = PostCategory::get();
        
        $breakingNews = Post::whereDate("created_at", Carbon::today())->take(4)->orderBy("id", "DESC")->get();
        
        $popularNews = Post::leftJoin('post_likes', 'posts.id', '=', 'post_likes.id')
            ->select([
                "posts.*",
                DB::raw("COUNT(posts.id) as likes")
            ])
            ->groupBy('posts.id')
            ->orderBy("likes")
            ->take(4)
            ->get();
       
        $mostLikedPost = Post::leftJoin('post_likes', 'posts.id', '=', 'post_likes.id')
            ->select([
                "posts.*",
                DB::raw("COUNT(posts.id) as likes")
            ])
            ->whereDate("posts.created_at", Carbon::today())
            ->groupBy('posts.id')
            ->orderBy("likes", "DESC")
            ->take(2)
            ->get();

        $videoPosts = VideoPost::with("post_category", "user")
            ->take(6)
            ->orderBy("id", "DESC")
            ->get();

        $mostLikedPost->transform(function($post){
            $mostLikedPostCategory = Post::where("post_category_id", $post->post_category_id)
                 ->take("5")
                 ->get();
            $post->posts = $mostLikedPostCategory;

            return $post;
        });


        $recentComments = Comment::take(3)
            ->orderBy("id", "DESC")
            ->get();
        
        $todayComments = Comment::whereDate("posts.created_at", Carbon::today())
            ->orderBy("id", "DESC")
            ->take(3);
        
        return view("welcome")->with(compact(
            "posts", 
            "breakingNews", 
            "mostLikedPost",
            "videoPosts",
            "popularNews",
            "todayComments",
            "recentComments"
        ));
    }

    public function index(){
        return view("admin.home")->with([
            "selected_item" => "home",
            "selected_sub_item" => ""
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()  {
        $posts = Post::with("post_category", "user")
            ->take(4)->orderBy("id", "DESC")->get();

        $categories = PostCategory::get();
        $dailyNews = Post::whereDate("created_at", Carbon::today())->take(4)->orderBy("id", "DESC")->get();
        // $popularNews = Post::with('likes')->orderBy("likes")->take(4)->get();
        // $mostLikedPost = Post::orderBy("likes", "DESC")->first();
        // $mostLikedPostCategory = collect([]);
    
        // if (!is_null($mostLikedPost)) {
        //     $mostLikedPostCategory = Post::where("post_category_id", $mostLikedPost->post_category_id)
        //         ->orderBy("likes", "DESC")
        //         ->take("10")
        //         ->get();
        // }
        
        return view("welcome")->with(compact("posts", "dailyNews"));
    }
}

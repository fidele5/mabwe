<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Company;
use App\Models\CompanyType;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\VideoPost;
use Carbon\Carbon;
use Exception;
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
            ->orderBy("id", "DESC")
            ->take(6)
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
        
        $todayComments = Comment::whereDate("created_at", Carbon::today())
            ->orderBy("id", "DESC")
            ->take(3)
            ->get();
        
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

    public function posts(){
        $posts = Post::orderBy("id", "DESC")
            ->paginate(9);
        
        return view("posts")->with(compact("posts"));
    }

    public function single($id){
        $post = Post::withCount("comments")->find($id);

        $post->views += 1;
        
        $popularNews = Post::leftJoin('post_likes', 'posts.id', '=', 'post_likes.id')
            ->select([
                "posts.*",
                DB::raw("COUNT(posts.id) as likes")
            ])
            ->groupBy('posts.id')
            ->orderBy("likes")
            ->take(4)
            ->get();

        $relatedNews = Post::orderBy("id", "DESC")
            ->where("id", "!=", $id)
            ->take(2)
            ->get();

        $comments = Comment::where("post_id", $id)->orderBy("id", "DESC")->paginate(4);

        $categories = PostCategory::withCount("posts")->get();

        return view("single-post")->with([
            "post" => $post,
            "popularNews" => $popularNews,
            "relatedNews" => $relatedNews,
            "comments" => $comments,
            "categories" => $categories
        ]);
    }

    public function comment(Request $request){
        $this->validate($request, [
            "name" => "required",
            "comment" => "required",
            "mail" => "required",
            "post_id" => "required"
        ]);

        $comment = new Comment();
        $comment->username = $request->name;
        $comment->email = $request->mail;
        $comment->text = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();

        return back();
    }

    public function category($id){
        $postCategory = PostCategory::find($id);
        if (is_null($postCategory)) {
            return back()->withException(new Exception("Category not found"));
        }

        $posts  = Post::where("post_category_id", $postCategory->id)
            ->orderBy("id", "DESC")
            ->paginate(10);

        return view("category")->with(compact("postCategory", "posts"));
    }

    public function companies($id){
        $companyType = CompanyType::find($id);

        if (is_null($companyType)) {
            return back()->withException(new Exception("Category not found"));
        }
        
        $companies = Company::where("company_type_id", $companyType->id)
            ->get();
        
        return view("companies")->with(compact("companies", "companyType"));
    }

    public function company($id){
        $company = Company::find($id);

        if (is_null($company)) {
            return back()->withException(new Exception("Category not found"));
        }
        
        return view('company')->with(compact("company"));
    }

    public function about(){
        return view("about");
    }

    public function partners(){
        return view("partners");
    }

    public function contact(){
        $popularNews = Post::leftJoin('post_likes', 'posts.id', '=', 'post_likes.id')
            ->select([
                "posts.*",
                DB::raw("COUNT(posts.id) as likes")
            ])
            ->groupBy('posts.id')
            ->orderBy("likes")
            ->take(4)
            ->get();

        return view("contact")->with(compact("popularNews"));
    }
}

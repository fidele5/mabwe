<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with("post_category")
            ->get();

        return view("admin.actualites.index")->with([
            "selected_item" => 'post',
            'selected_sub_item' => 'all',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();

        return view("admin.actualites.create")->with([
            "selected_item" => 'post',
            'selected_sub_item' => 'new',
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'title' => 'required',
            'text' => 'required',
            'post_category_id' => 'required|numeric|exists:post_categories,id'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->post_category_id = $request->post_category_id;

        if ($request->hasFile("image")) {
            $file = $request->file('image');

            $uploadFolder = 'posts';
            $filename = \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $post->image = $image;
        }

        $post->user_id = Auth::user()->id;
        $post->save();


        return response()->json([
            "status" => "success",
            "back" => "post"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::all();

        return view("admin.actualites.edit")->with([
            "selected_item" => 'post',
            'selected_sub_item' => '',
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'post_category_id' => 'required|numeric|exists:post_categories,id'
        ]);

        $post = Post::find($id);
        $post->user_id = Auth::user()->id;
        $post->post_category_id = $request->post_category_id;
        $post->title = $request->title;
        $post->text = $request->text;

        if ($request->hasFile("image")) {
            $file = $request->file('image');

            $uploadFolder = 'posts';
            $filename = \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $post->image = $image;
        }

        
        $post->save();

        return response()->json([
            "status" => "success",
            "back" => "post"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return response()->json([
            "status" => "success",
            "back" => "post"
        ]);
    }
}

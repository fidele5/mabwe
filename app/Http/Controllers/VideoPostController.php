<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Models\VideoPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoPosts = VideoPost::get();

        return view("admin.video.index")->with([
            "selected_item" => 'video-post',
            'selected_sub_item' => 'all',
            'videoPosts' => $videoPosts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::get();

        return view("admin.video.create")->with([
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
        $this->validate($request, [
            'post_category_id' => 'required|numeric|exists:post_categories,id',
            'video_path' => 'required|url',
            'caption' => 'required|image',
            'title' => 'required'
        ]);

        $videoPost = new VideoPost();
        $videoPost->user_id = Auth::user()->id;
        $videoPost->post_category_id = $request->post_category_id;
        $videoPost->video_path = $request->video_path;
        $videoPost->title = $request->title;

        if ($request->hasFile("caption")) {
            $file = $request->file('caption');

            $uploadFolder = 'uploads/news-posts';
            $filename = "video-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $videoPost->caption = $image;
        }

        $videoPost->save();

        return response()->json([
            "status" => "success",
            "back" => "video-post"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoPost $videoPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoPost $videoPost)
    {
        $categories = PostCategory::get();

        return view("admin.video.edit")->with([
            "selected_item" => 'post',
            'selected_sub_item' => 'new',
            'categories' => $categories,
            'videoPost' => $videoPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_category_id' => 'required|numeric|exists:post_categories,id',
            'video_path' => 'required|url',
            'title' => 'required'
        ]);

        $videoPost = VideoPost::find($id);
        $videoPost->user_id = Auth::user()->id;
        $videoPost->post_category_id = $request->post_category_id;
        $videoPost->video_path = $request->video_path;
        $videoPost->title = $request->title;

        if ($request->hasFile("caption")) {
            $file = $request->file('caption');

            $uploadFolder = 'uploads/news-posts';
            $filename = "video-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $videoPost->caption = $image;
        }

        $videoPost->save();

        return response()->json([
            "status" => "success",
            "back" => "video-post"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoPost $videoPost)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::get();

        return view("admin.categories.index")->with([
            "selected_item" => "post-category",
            "selected_sub_item" => "all",
            "categories" => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create")->with([
            "selected_item" => "post-category",
            "selected_sub_item" => "new",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required"
        ]);

        $postCategory = new PostCategory();
        $postCategory->name = $request->name;
        $postCategory->save();

        return response()->json([
            "status" => "success",
            "back" => "post-category"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        return view("admin.categories.edit")->with([
            "selected_item" => "post-category",
            "selected_sub_item" => "new",
            'category' => $postCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required"
        ]);

        $postCategory = PostCategory::find($id);
        $postCategory->name = $request->name;
        $postCategory->save();

        return response()->json([
            "status" => "success",
            "back" => "post-category"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        return response()->json([
            "status" => "success",
            "back" => ""
        ]);
    }
}

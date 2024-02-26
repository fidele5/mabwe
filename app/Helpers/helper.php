<?php
use App\Models\CompanyType;
use App\Models\Post;
use App\Models\PostCategory;


function get_option($option_key)
{
    if (\App\Models\Setting::where('option_key', $option_key)->count() > 0) {
        $option = \App\Models\Setting::where('option_key', $option_key)->first();
        return $option->option_value;
    } else {
        return '';
    }

}

function languages()
{
    return \App\Models\Language::where('status', 1)->get();
}

function get_lastest_news()
{
    return Post::orderBy("id", "desc")
    ->take(3)
    ->get();
}

function get_company_types(){
    return CompanyType::get();
}

function get_categories(){
    return PostCategory::get();
}

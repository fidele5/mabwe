<?php

use App\Models\CompanyAd;
use App\Models\CompanyType;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;

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
    return Post::inRandomOrder()
    ->take(3)
    ->get();
}

function get_company_types(){
    return CompanyType::get();
}

function get_categories(){
    return PostCategory::get();
}

function get_ads(){
    return CompanyAd::inRandomOrder()
        ->whereDate("expire_at", ">=", Carbon::today()->toDateString())
        ->get();
}

function get_random_ad(){
    $array  = get_ads()->toArray();
    $k = array_rand($array);
    return $array[$k];
}

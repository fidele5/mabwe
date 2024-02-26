<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyAd;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyAdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyAds = CompanyAd::with('company')
            ->get();
        
        return view("admin.ads.index")->with([
            "selected_item" => "ads",
            "selected_sub_item" => "all",
            "companyAds" => $companyAds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::get();
        
        return view("admin.ads.create")->with([
            "selected_item" => "ads",
            "selected_sub_item" => "new",
            "companies" => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "company_id" => "required|numeric|exists:companies,id",
            "image" => "required|image|dimensions:max_width=300,max_height=250",
            "image_tablet" => "required|image|dimensions:max_width=200,max_height=200",
            "title" => "required",
            "duration" => "required|numeric"
        ]);

        $companyAd = new CompanyAd();
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        $companyAd->external_url = $request->external_url;
        
        if ($request->hasFile('image') && $request->hasFile('image_tablet')) {
            $file = $request->file('image');
            $tabletFile = $request->file('image_tablet');
            $company = Company::find($request->company_id);

            $uploadFolder = 'uploads/ads';
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $tabletImageName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $tabletImage = $tabletFile->storeAs($uploadFolder, $tabletImageName);
            
            $companyAd->tablet_image = $tabletImage;
            $companyAd->image_path = $image;
        }

        $companyAd->save();

        return response()->json([
            "status" => "success",
            "back" => "ads"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyAd $companyAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companies = Company::get();
        $companyAd = CompanyAd::find($id);
        $companyAd->duration = Carbon::parse($companyAd->created_at)->diffInDays(Carbon::parse($companyAd->expire_at));

        return view("admin.ads.edit")->with([
            "selected_item" => "ads",
            "selected_sub_item" => "new",
            "companies" => $companies,
            'companyAd' => $companyAd
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "company_id" => "required|numeric|exists:companies,id",
            "title" => "required",
            "duration" => "required|numeric",
            "image" => "image|dimensions:max_width=300,max_height=250",
            "image_tablet" => "image|dimensions:max_width=200,max_height=200",
        ]);

        $companyAd = CompanyAd::find($id);
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        $companyAd->external_url = $request->external_url;
        
        if ($request->hasFile('image') && $request->hasFile('image_tablet')) {
            $file = $request->file('image');
            $tabletFile = $request->file('image_tablet');
            $company = Company::find($request->company_id);

            $uploadFolder = 'uploads/ads';
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $tabletImageName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $tabletImage = $tabletFile->storeAs($uploadFolder, $tabletImageName);
            
            $companyAd->tablet_image = $tabletImage;
            $companyAd->image_path = $image;
        }

        $companyAd->save();

        return response()->json([
            "status" => "success",
            "back" => "ads"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CompanyAd::find($id)->delete();

        return response()->json([
            "status" => "success",
            "back" => "ads"
        ]);
    }
}

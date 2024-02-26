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
            "landscape_desktop" => "required|image|dimensions:max_width=728,max_height=90",
            "landscape_tablet" => "required|image|dimensions:max_width=468,max_height=60",
            "landscape_mobile" => "required|image|dimensions:max_width=300,max_height=250",
            "title" => "required",
            "duration" => "required|numeric"
        ]);

        $companyAd = new CompanyAd();
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        $companyAd->external_url = $request->external_url;
        
        if ($request->hasFile('image') && 
            $request->hasFile('image_tablet') && 
            $request->hasFile('landscape_desktop') && 
            $request->hasFile('landscape_tablet') && 
            $request->hasFile('landscape_mobile')
        ) {
            $file = $request->file('image');
            $tabletFile = $request->file('image_tablet');
            $landingDesctopFile = $request->file('landscape_desktop');
            $landingTabletFile = $request->file('landscape_tablet');
            $landingMobileFile = $request->file('landscape_mobile');

            $company = Company::find($request->company_id);

            $uploadFolder = 'uploads/ads';
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $tabletImageName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $tabletImage = $tabletFile->storeAs($uploadFolder, $tabletImageName);
            
            $landingDesctopImageName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $landingDesctopImage = $landingDesctopFile->storeAs($uploadFolder, $landingDesctopImageName);
            
            $landingTabletName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $landingTabletImage = $landingTabletFile->storeAs($uploadFolder, $landingTabletName);
            
            $landingMobileName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $landingMobileImage = $landingMobileFile->storeAs($uploadFolder, $landingMobileName);
            
            $companyAd->landscape_tablet = $landingTabletImage;
            $companyAd->landscape_desktop = $landingDesctopImage;
            $companyAd->landscape_mobile = $landingMobileImage;
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
            "landscape_desktop" => "image|dimensions:max_width=728,max_height=90",
            "landscape_tablet" => "image|dimensions:max_width=468,max_height=60",
            "landscape_mobile" => "image|dimensions:max_width=300,max_height=250",
        ]);

        
        $company = Company::find($request->company_id);
        $uploadFolder = 'uploads/ads';

        $companyAd = CompanyAd::find($id);
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        $companyAd->external_url = $request->external_url;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);
            $companyAd->image_path = $image;
        }
        
        if($request->hasFile('image_tablet')){
            $tabletFile = $request->file('image_tablet');
            $tabletImageName = "tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$tabletFile->getClientOriginalExtension();
            $tabletImage = $tabletFile->storeAs($uploadFolder, $tabletImageName);
            $companyAd->tablet_image = $tabletImage;
        }

        if($request->hasFile('landscape_desktop')){
            $landingDesctopFile = $request->file('landscape_desktop');
            $landingDesctopImageName = "landscape-desktop-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$landingDesctopFile->getClientOriginalExtension();
            $landingDesctopImage = $landingDesctopFile->storeAs($uploadFolder, $landingDesctopImageName);
            $companyAd->landscape_desktop = $landingDesctopImage;
        }

        if($request->hasFile('landscape_tablet')){
            $landingTabletFile = $request->file('landscape_tablet');
            $landingTabletName = "landscape-tablet-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$landingTabletFile->getClientOriginalExtension();
            $landingTabletImage = $landingTabletFile->storeAs($uploadFolder, $landingTabletName);
            $companyAd->landscape_tablet = $landingTabletImage;
        }

        if($request->hasFile('landscape_mobile')){
            $landingMobileFile = $request->file('landscape_mobile');
            $landingMobileName = "landscape-mobile-" . $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$landingMobileFile->getClientOriginalExtension();
            $landingMobileImage = $landingMobileFile->storeAs($uploadFolder, $landingMobileName);
            $companyAd->landscape_mobile = $landingMobileImage;
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

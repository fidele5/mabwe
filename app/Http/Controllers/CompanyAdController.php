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
            "image" => "required|image",
            "title" => "required",
            "duration" => "required|numeric"
        ]);

        $companyAd = new CompanyAd();
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $company = Company::find($request->company_id);

            $uploadFolder = 'uploads/ads';
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $companyAd->caption = $image;
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
    public function edit(CompanyAd $companyAd)
    {
        $companies = Company::get();
        
        return view("admin.ads.create")->with([
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
            "duration" => "required|numeric"
        ]);

        $companyAd = CompanyAd::find($id);
        $companyAd->title = $request->title;
        $companyAd->company_id = $request->company_id;
        $companyAd->expire_at = Carbon::now()->addDays($request->duration)->toDateString();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $company = Company::find($request->company_id);

            $uploadFolder = 'uploads/ads';
            $filename = $company->name . "-" . \Str::slug($request->title). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $companyAd->caption = $image;
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

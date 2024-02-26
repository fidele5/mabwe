<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyImage;
use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.companies.index")->with([
            "selected_item" => "company",
            "selected_sub_item" => "all",
            "companies" => Company::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.companies.create")->with([
            "selected_item" => "company",
            "selected_sub_item" => "new",
            "companyTypes" => CompanyType::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_type_id' => 'required|numeric|exists:company_types,id'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->company_type_id = $request->company_type_id;
        $company->email = $request->email;
        $company->phone = $request->phone;

        if ($request->hasFile("logo")) {
            $file = $request->file('logo');

            $uploadFolder = '/uploads/logo';
            $filename = \Str::slug($request->name). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $company->logo = $image;
        }

        
        $company->address = $request->address;
        $company->save();
        
        if (isset($request->repeater_list)) {
            $folderName = "uploads/company-images";

            foreach ($request->repeater_list as $key => $value) {
                $companyImage = new CompanyImage();
                $companyImage->company_id = $company->id;
                
                $filename = \Str::uuid() . "-" . implode('_', explode(' ', strtolower($company->name))) . "." . $value['file']->getClientOriginalExtension();
                $path = $value['file']->storeAs($folderName, $filename);

                $companyImage->image_path = $path;
                
                $companyImage->save();
            }
        }

        return response()->json([
            "status" => "success",
            "back" => "company"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view("admin.companies.edit")->with([
            "selected_item" => "company",
            "selected_sub_item" => "new",
            "companyTypes" => CompanyType::get(),
            "company" => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_type_id' => 'required|numeric|exists:company_types,id'
        ]);

        $company->name = $request->name;
        $company->description = $request->description;
        $company->company_type_id = $request->company_type_id;
        $company->email = $request->email;
        $company->phone = $request->phone;

        if ($request->hasFile("logo")) {
            $file = $request->file('logo');

            $uploadFolder = '/uploads/logo';
            $filename = \Str::slug($request->name). "-" . \Str::uuid().".".$file->getClientOriginalExtension();
            $image = $file->storeAs($uploadFolder, $filename);

            $company->logo = $image;
        }

        $company->address = $request->address;
        $company->save();

        if (isset($request->repeater_list)) {
            $folderName = "uploads/company-images";

            foreach ($request->repeater_list as $key => $value) {
                $companyImage = new CompanyImage();
                $companyImage->company_id = $company->id;
                
                $filename = \Str::uuid() . "-" . implode('_', explode(' ', strtolower($company->name))) . "." . $value['file']->getClientOriginalExtension();
                $path = $value['file']->storeAs($folderName, $filename);

                $companyImage->image_path = $path;
                
                $companyImage->save();
            }
        }


        return response()->json([
            "status" => "success",
            "back" => "company"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([
            "status" => "success",
            "back" => "company"
        ]);
    }
}

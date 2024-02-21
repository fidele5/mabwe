<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyTypes = CompanyType::get();

        return view("admin.company-type.index")->with([
            "selected_item" => "company-type",
            "selected_sub_item" => "all",
            "companyTypes" => $companyTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.company-type.create")->with([
            "selected_item" => "company-type",
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

        $companyType = new CompanyType();
        $companyType->name = $request->name;
        $companyType->save();

        return response()->json([
            "status" => "success",
            "back" => "company-type"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyType $companyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyType $companyType)
    {
        return view("admin.company-type.edit")->with([
            "selected_item" => "company-type",
            "selected_sub_item" => "new",
            'companyType' => $companyType
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

        $companyType = CompanyType::find($id);
        $companyType->name = $request->name;
        $companyType->save();

        return response()->json([
            "status" => "success",
            "back" => "company-type"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyType $companyType)
    {
        //
    }
}

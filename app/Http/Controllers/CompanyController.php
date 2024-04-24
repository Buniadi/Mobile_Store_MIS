<?php

namespace App\Http\Controllers;

use App\Http\Requests\companyRequest;
use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return response()->json($companies);
    }
    

    public function store(companyRequest $request)
    {

        $id = auth()->id();
        Company::create([
            'name'=>$request->input('name'),
            'country'=>$request->input('country'),
            'created_by'=>$id,
        ]);

        return response()->json(['message'=>'new company created successfuly '], 200);
    }
    public function edit($id){
        $data = Company::find($id);
        return response()->json($data);
    }
}

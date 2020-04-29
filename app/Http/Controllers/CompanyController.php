<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Storage;
use Image;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $company = Company::paginate(10);
        return view('company.index', ['company' => $company]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->stream();
            Storage::disk('local')->put('public/company/'.'/'.$fileName, $img, 'public');
        }

        $company = new Company([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'logo' => isset($fileName)? $fileName : '',
            'website' => $request->get('website'),
        ]);
        $company->save();
        return redirect('/company')->with('success', 'Company Info saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());

            $img->stream();
            Storage::disk('local')->put('public/company/'.'/'.$fileName, $img, 'public');
        }

        $company = Company::find($id);
        $company->name =  $request->get('name');
        $company->email = $request->get('email');
        $company->website = $request->get('website');
        if(isset($fileName) && $fileName != ""){
            $company->logo = $fileName;
        }
        $company->save();

        return redirect('/company')->with('success', 'Company updated!');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect('/company')->with('success', 'Company deleted!');
    }
}
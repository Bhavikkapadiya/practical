<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employee = Employee::paginate(10);
        return view('employee.index', ['employee' => $employee]);
    }

    public function create()
    {
        $company = Company::all();
        return view('employee.create',['company' => $company]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname'=>'required',
        ]);

        $employee = new Employee([
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'company_id' => $request->get('company'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);
        $employee->save();
        return redirect('/employee')->with('success', 'Employee Info saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $company = Company::all();
        return view('employee.edit', compact('employee','company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname'=>'required',
        ]);

        $employee = Employee::find($id);
        $employee->fname =  $request->get('fname');
        $employee->lname =  $request->get('lname');
        $employee->email = $request->get('email');
        $employee->company_id = $request->get('company');
        $employee->phone = $request->get('phone');
        $employee->save();

        return redirect('/employee')->with('success', 'Employee updated!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employee')->with('success', 'Employee deleted!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Session;
use App\Models\Company;
use App\Models\Employee;
class AdminEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::pluck('name', 'id')->all();
        return view('admin.employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
        $data = $request->all();
        Employee::create($data);
        Session::flash('flash_message', 'Employee has been created!');
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($languange, $id)
    {
        //
        $company = Company::findOrFail($id);
        $employees = Employee::where('company', $company->id)->get();
        return view('admin.employees.index', compact('company', 'employees'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($languange, $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $companies = Company::pluck('name', 'id')->all();
        return view('admin.employees.edit', compact('employee', 'companies'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request,$languange, $id)
    {
        //
        $data = $request->all();
        $employee = Employee::findOrFail($id);
        if($employee) {
            $employee->update($data);
            Session::flash('flash_message', 'Employee has been updated!');
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($languange, $id)
    {
        //
        $employee = Employee::findOrFail($id);
         if($employee) {
            $employee->delete();
            Session::flash('flash_message', 'Employee has been deleted!');
            return redirect()->route('companies.index', app()->getLocale());
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
class AdminCompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        //
       $user = Auth::user();
       $data = $request->all();
       if($user){
          //logo set
        $file = $request->file('logo');
        if($file = $request->file('logo')){
            $name = time().$file->getClientOriginalName();
            $file->move('logo', $name);
            $data['logo'] = $name;
         }
        $company = Company::create($data);
        Mail::send('emails.companyCreated', $company->toArray(), function($message){
            $message->to('shkulakurenato@gmail.com', 'Shkulaku')->subject('Company is created');
        });
       }
       Session::flash('flash_message', 'The Company has been created!');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $company = Company::findOrFail($id);
        if($company){
           return view('admin.companies.edit', compact('company'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request,$languange, $id)
    {
        //
        $data = $request->all();
        $company = Company::findOrFail($id);
           //logo update
        $file = $request->file('logo');
        if(!$file){
            unset($data['logo']);
        }
        else {
            $name = time().$file->getClientOriginalName();
            $file->move('logo', $name);
            $data['logo'] = $name;
        }
        $company->update($data); 
        Session::flash('flash_message', 'The Company has been updated!');
        return redirect()->back();
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
        $company = Company::findOrFail($id);
        unlink(public_path() . '/logo/' .$company->logo);
        $company->delete();
        Session::flash('flash_message', 'The Company has been deleted!');
        return redirect()->back();
    }
}

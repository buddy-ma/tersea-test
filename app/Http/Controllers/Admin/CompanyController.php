<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\History;
use App\Rules\PhoneValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function list()
    {
        $companies = Company::get();
        return view('admin.mains-admin.company.company-list', ['companies'=>$companies]);
    }

    public function add()
    {
        return view('admin.mains-admin.company.company-add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'email' => 'required|email|min:5|unique:companies',
            'phone' => ['required', 'digits:10', 'unique:companies', new PhoneValidation()],
            'address' => 'required|string|min:4',
        ]);

        $company = new Company();
        $company->title = $request->input('title');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->address = $request->input('address');
        $company->save();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a ajouté la societe '.$company->title,
            'link' => '/admin/companies'
        ]);
        session()->flash('success','Company has been added successfully');
        return redirect('admin/companies'); 
    }

    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.mains-admin.company.company-show', ['company' => $company]);
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.mains-admin.company.company-edit', ['company' => $company]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'email' => "required|email|min:5|unique:companies,email,$id,id",
            'phone' => ['required', 'digits:10', "unique:companies,phone,$id,id", new PhoneValidation()],
            'address' => 'required|string|min:4',
        ]);

        $company = Company::find($id);
        $company->title = $request->input('title');
        $company->email = $request->input('email');
        $company->phone = $request->input('phone');
        $company->address = $request->input('address');
        $company->save();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a modifier la societe '.$company->title,
            'link' => '/admin/companies'
        ]);
        session()->flash('success','Company has been updated successfully');
        return redirect('admin/companies'); 
    }

    public function delete($id)
    {
        $company = Company::find($id);
        if(count($company->employes) != 0){
            return back()->with('error', 'Company has Employes still');
        }
        $company->delete();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a supprimé la societe '.$company->title,
            'link' => '/admin/companies'
        ]);
        session()->flash('success', 'Company has been deleted sucssefuly');
        return redirect('admin/companies');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Job;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::whenSearch(request()->search)->paginate(15);

        return view('dashboard.companies.index', compact('companies'));
    }

    public function edit($id)
    {
        $company = Company::find($id);

        return view('dashboard.companies.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
        ]);

        $company = Company::find($id);
        $company->cname = request('cname');
        $company->slug = str_slug(request('cname'));
        $company->address = request('address');
        $company->street = request('street');
        $company->housenumber = request('housenumber');
        $company->postalcode = request('postalcode');
        $company->city = request('city');
        $company->province = request('province');
        $company->phone = request('phone');
        $company->email = request('email');
        $company->website = request('website');
        $company->slogan = request('slogan');
        $company->description = request('description');


        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/',$filename);
            $company->logo = $filename;
        }
        $company->save();
        session()->flash('success', 'Staffmember updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $company = Company::find($id);
        $user_id = $company->user_id;

        $company->delete();
        // $jobs = Job::where('user_id', $user_id)->get()->delete();

        // $user = User::where('id', $user_id)->get()->delete();
        session()->flash('success', 'Company deleted successfully');
        return redirect()->route('admin.company.index');
    }
}

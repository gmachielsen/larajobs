<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::whenSearch(request()->search)->paginate(15);

        return view('dashboard.companies.index', compact('companies'));
    }

    public function edit()
    {
        return view('dashboard.companies.edit');
    }
}

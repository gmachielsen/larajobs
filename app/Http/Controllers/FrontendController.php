<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staffmember;
use App\Blog;

class FrontendController extends Controller
{
    public function aboutus() 
    {
        $staffmembers = Staffmember::all();
        return view('frontend.about', compact('staffmembers'));
    }

    public function vacancies() 
    {
        return view('frontend.vacancies');
    }

    public function news() 
    {
        return view('frontend.news');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function approach()
    {
        return view('frontend.approach');
    }

    public function specialpeople()
    {
        return view('frontend.specialpeople');
    }

    public function blog($id)
    {
        $blog = Blog::find($id);
        return view('frontend.showblog', compact('blog'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function aboutus() 
    {
        return view('frontend.about');
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
}

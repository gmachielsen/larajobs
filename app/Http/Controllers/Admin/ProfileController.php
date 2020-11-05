<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::whenSearch(request()->search)->paginate(2);

        return view('dashboard.profiles.index', compact('users'));
    }
}

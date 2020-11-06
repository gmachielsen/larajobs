<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::whenSearch(request()->search)->where('user_type', 'seeker')->paginate(15);

        return view('dashboard.profiles.index', compact('users'));
    }
}

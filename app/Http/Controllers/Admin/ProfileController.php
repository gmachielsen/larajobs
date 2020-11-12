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

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.profiles.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        session()->flash('success', 'Profile updated succesfully');
        return redirect()->back(); 
    }
}

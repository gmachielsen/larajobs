<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Staffmember;

class StaffController extends Controller
{
    public function index()
    {
        $staffmembers = Staffmember::whenSearch(request()->search)->paginate(2);

        return view('dashboard.staffmembers.index', compact('staffmembers'));
    }

    public function create()
    {
        return view('dashboard.staffmembers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:2',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/staffmemberImages/',$filename);
        
            Staffmember::create([
                'name' => request('name'),
                'slug' => str_slug(request('name')),
                'function' => request('function'),
                'description' => request('description'),
                'email' => request('email'),
                'phone' => request('phone'),
                'phone2' => request('phone2'),
                'image'=> $filename,
            ]);
        }
        session()->flash('success', 'Staffmember saved succesfully');
        return redirect()->back(); 
    }

    public function edit($id)
    {
        $staffmember = Staffmember::find($id);

        return view('dashboard.staffmembers.edit', compact('staffmember'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|min:2',
        ]);

        $staffmember = Staffmember::find($id);
        $staffmember->name = request('name');
        $staffmember->slug = str_slug(request('name'));
        $staffmember->function = request('function');
        $staffmember->description = request('description');
        $staffmember->email = request('email');
        $staffmember->phone = request('phone');
        $staffmember->phone2 = request('phone2');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/staffmemberImages/',$filename);
            $staffmember->image = $filename;
        }
        $staffmember->save();
        session()->flash('success', 'Staffmember updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $staffmember = Staffmember::find($id);
        $staffmember->delete();
        session()->flash('success', 'Staffmember deleted successfully');
        return redirect()->route('admin.staffmembers.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::paginate(20);
        return view('admin.index', compact('posts'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required|min:3',
            'content'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug($title),
                'content'=>$request->get('content'),
                'image'=>$path,
                'status'=>$request->get('status')
            ]);
        }
        return redirect('/dashboard')->with('message','Post created successfully');
    }
}

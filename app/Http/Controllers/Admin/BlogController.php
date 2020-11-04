<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::whenSearch(request()->search)->paginate(2);

        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('dashboard.blogs.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:2',
        ]);


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/blogImages/',$filename);
        
            Blog::create([
                'title' => request('title'),
                'image'=> $filename,
                'content' => request('content'),
            ]);
        }
        session()->flash('success', 'Category saved succesfully');
        return redirect()->back(); 

    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        return view('dashboard.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:2',
        ]);

        $blog = Blog::find($id);
        $blog->title = request('title');
        $blog->content = request('content');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/newsImages/',$filename);
            $news->image = $filename;
        }
        $blog->save();
        session()->flash('success', 'Blog updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        session()->flash('success', 'Blog deleted successfully');
        return redirect()->route('admin.blogs.index');
    }
}

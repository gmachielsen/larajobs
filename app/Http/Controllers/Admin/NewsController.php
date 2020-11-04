<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsitems = News::whenSearch(request()->search)->paginate(2);

        return view('dashboard.news.index', compact('newsitems'));
    }

    public function create()
    {
        return view('dashboard.news.create');
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
            $file->move('uploads/newsImages/',$filename);
        
            News::create([
                'title' => request('title'),
                'image'=> $filename,
                'content' => request('content'),
            ]);
        }
        session()->flash('success', 'Newsitem saved succesfully');
        return redirect()->back(); 
    }

    public function edit($id)
    {
        $news = News::find($id);

        return view('dashboard.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:2',
        ]);

        $news = News::find($id);
        $news->title = request('title');
        $news->content = request('content');


        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/newsImages/',$filename);
            $news->image = $filename;
        }
        $news->save();
        session()->flash('success', 'Newsitem updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $news = News::find($id);
        $news->delete();
        session()->flash('success', 'Newsitem deleted successfully');
        return redirect()->route('admin.news.index');
    }
}

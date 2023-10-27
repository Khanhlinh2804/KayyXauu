<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Skill;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::orderByDesc('id','desc')->search()->paginate(3);
        return view('admin.blog.list', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skill = Skill::all();
        return view('admin.blog.create',compact('skill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ([
            'name' => 'required|max:255|min:5', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'content' => 'required', 
            'tag' => 'required',
            'author' => 'required',
            'summary' => 'required',
        ]);
        $request->validate($rules);
        $file_name = time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $file_name);

        Blog::create([
            'name' => $request->name,
            'image' => $file_name,
            'content' => $request->content,
            'status' => $request->status,
            'size' => $request->size,
            'skill_id' => $request->skill_id,
            'tag' => $request->tag,
            'author' => $request->author,
            'summary' => $request->summary,
        ]);
        return redirect()->route('blog.index')->with('success', 'Add Blog SuccessFully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::all();
        $blog = Blog::find($id);
        return view('admin.blog.update', compact('blog','skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);
        $rules = ([
            'name' => 'required|max:255|min:5', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'content' => 'required', 
            'tag' => 'required',
            'author' => 'required',
            'summary' => 'required',
        ]);
        $request->validate($rules);
        if($request->has('image')){
            $file_name = time() .$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
        }
        $blog->update([
            'name' => $request->name,
            'image' => $file_name,
            'content' => $request->content,
            'skill_id' => $request->skill_id,
            'status' => $request->status,
            'tag' => $request->tag,
            'size' => $request->size,
            'author' => $request->author,
            'summary' => $request->summary,
        ]);
        return redirect()->route('blog.index')->with('success', 'Edit blog Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id)->delete();
        return redirect()->back()->with('success', 'Delete Blog Successfully');
    }
    public function trashed()
    {
        $blog= Blog::onlyTrashed()->search()->orderByDesc('id','desc')->paginate(10);

        return view('admin.blog.trash', compact('blog'));
    }

    public function restore($id){
        $blog = Blog::withTrashed()->find($id);

        if ($blog) {
            $blog->restore();
            return redirect()->back()->with('success', 'blog restored successfully.');
        } else {
            return redirect()->route('blog.index')->with('error', 'blog not found.');
        }
    }
    public function delete($id){
        $blog = Blog::withTrashed()->find($id);

        if ($blog) {
            $blog->forceDelete();
            return redirect()->route('blog.index')->with('success', 'Blog restored successfully.');
        } else {
            return redirect()->back()->with('error', 'blog not found.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::orderBy('name','desc')->search()->paginate(10);
        return view('backend.comment.list', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Comment::create($request->all());
        return redirect()->route('comment.index')->with('success','Add Comment Successful');
    }
    public function comment(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Comment::create($request->all());
        return redirect()->route('comment')->with('success','Add Comment Successful');
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
        $comment = Comment::find($id);
        return view('admin.comment.update',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->update($request->all());
        return redirect()->route('comment.index')->with('success','Update Comment Successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id)->delete();
        return redirect()->back()->with('success','Delete Comment Successful');
    }
    public function trashed()
    {
        $comment= comment::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.comment.trash', compact('comment'));
    }

    public function restore($id){
        $comment = comment::withTrashed()->find($id);

        if ($comment) {
            $comment->restore();
            return redirect()->back()->with('success', 'comment restored successfully.');
        } else {
            return redirect()->route('comment.index')->with('error', 'comment not found.');
        }
    }
    public function delete($id){
        $comment = comment::withTrashed()->find($id);

        if ($comment) {
            $comment->forceDelete();
            return redirect()->route('comment.index')->with('success', 'comment restored successfully.');
        } else {
            return redirect()->back()->with('error', 'comment not found.');
        }
    }
}

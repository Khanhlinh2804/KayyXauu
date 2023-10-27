<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()  {
        $category = Category::OrderByDesc('name','desc')->search()->paginate(10);
        return view('admin.category.list',compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255|min:5',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $file_name = time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $file_name);
        try {
            Category::create([
                'name' => $request->name,
                'image' => $file_name,
                'status' => $request->status
            ]);
            return redirect()->route('category.index')->with('success', 'Create success');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', 'Create unsuccessfully ' );
        }
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
        $category = Category::find($id);
        return view('admin.category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $rules = ([
            'name' => 'required|max:255|min:5', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $request->validate($rules);
        if($request->has('image')){
            $file_name = time() .$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
        }
        $category->update([
            'name'=>$request->name,
            'image' => $file_name,
            'status'=>($request->status == 'Active' ? 'Active' : 'No Active'),
        ]);
        return redirect()->route('category.index')->with('success','Update Category Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::find($id)->delete();
        if($category){
            return redirect()->back()->with('success','Delete Category Successfuly');
        }
        return redirect()->back()->with('error','Delete Category Unsuccessfuly');
    }
    public function trashed()
    {
        $category= Category::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.category.trash', compact('category'));
    }

    public function restore($id){
        $category = Category::withTrashed()->find($id);

        if ($category) {
            $category->restore();
            return redirect()->route('category.index')->with('success', 'Category restored successfully.');
        } else {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
    }
    public function delete($id){
        $category = Category::withTrashed()->find($id);

        if ($category) {
            $category->forceDelete();
            return redirect()->route('category.index')->with('success', 'AuthoCategoryr restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
}

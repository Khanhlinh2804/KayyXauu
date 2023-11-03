<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::orderBy('id','desc')->search()->paginate(8);
        return view('admin.banner.list', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'summary' => 'required', 
            'image' => 'required|image',
            'status' => 'required'
        ]);
        $file_name = time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $file_name);

        $banner = Banner::create([
            'name' => $request->name,
            'link' => $request->link,
            'summary' => $request->summary,
            'image' => $file_name,
            'status' => $request->status
            ]);
        // dd($banner);
            return redirect()->route('banner.index')->with('success','Add banner successfully');
        
    
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
        $banner = Banner::find($id);
        return view('admin.banner.update', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'summary' => 'required', 
            'image' => 'required|image',
            'status' => 'required'
        ]);
        if($request->has('image')){
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name); 
        }
        Banner::find($id)->update([
            'name' => $request->name,
            'link' => $request->link,
            'summary' => $request->summary,
            'image' => $file_name,
            'status' => $request->status,
        ]);
        return redirect()->route('banner.index')->with('success','update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id)->delete();
        return redirect()->route('banner.index')->with('success','Delete Successfully');
    }

    public function trashed()
    {
        $banner= Banner::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.banner.trash', compact('banner'));
    }

    public function restore($id){
        $banner = banner::withTrashed()->find($id);

        if ($banner) {
            $banner->restore();
            return redirect()->back()->with('success', 'banner restored successfully.');
        } else {
            return redirect()->route('banner.index')->with('error', 'banner not found.');
        }
    }
    public function delete($id){
        $banner = banner::withTrashed()->find($id);

        if ($banner) {
            $banner->forceDelete();
            return redirect()->route('banner.index')->with('success', 'banner restored successfully.');
        } else {
            return redirect()->back()->with('error', 'banner not found.');
        }
    }
}

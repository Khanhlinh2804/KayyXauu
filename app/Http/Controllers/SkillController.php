<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skill = Skill::orderBy('name','desc')->search()->paginate(10);
        return view('admin.skill.list', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        Skill::create($request->all());
        return redirect()->route('skill.index')->with('success','Add Skill Successful');
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
        $skill = Skill::find($id);
        return view('admin.skill.update', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $skill = Skill::find($id);
        if($skill){
            $data = $request->all();
            $skill->update([
                'name'=>$request->name,
                'status'=>($request->status == 'Active' ? 'Active' : 'No Active'),
            ]);
            return redirect()->route('skill.index')->with('success','Update Skill Successful');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id)->delete();
        return redirect()->back()->with('success','Delete Skill successfullt');
    }

    public function trashed()
    {
        $skill= Skill::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.skill.trash', compact('skill'));
    }

    public function restore($id){
        $skill = Skill::withTrashed()->find($id);

        if ($skill) {
            $skill->restore();
            return redirect()->route('skill.index')->with('success', 'skill restored successfully.');
        } else {
            return redirect()->route('skill.index')->with('error', 'skill not found.');
        }
    }
    public function delete($id){
        $skill = Skill::withTrashed()->find($id);

        if ($skill) {
            $skill->forceDelete();
            return redirect()->route('skill.index')->with('success', 'Authoskillr restored successfully.');
        } else {
            return redirect()->back()->with('error', 'skill not found.');
        }
    }
}

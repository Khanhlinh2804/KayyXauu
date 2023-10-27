<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::orderByDesc('name','desc')->search()->paginate(10);
        return view('admin.contact.list', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.pages.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'full'=> 'required',
            'email' => 'email',
            'phone' => 'required|regex:/^0[0-9]{9}$/'
        ]);
        Contact::create($request->all());
        return redirect()->back()->with('success','We will contact you soon');
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
        $contact = Contact::find($id);
        return view('admin.contact.update', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::find($id);
        $contact->update($request->all());
        return redirect()->route('contact.index')->with('success','update contact successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id)->delete();
        return redirect()->back()->with('success', 'delete contact successfuly');
    }
    public function trashed()
    {
        $contact= Contact::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.contact.trash', compact('contact'));
    }

    public function restore($id){
        $contact = Contact::withTrashed()->find($id);

        if ($contact) {
            $contact->restore();
            return redirect()->back()->with('success', 'contact restored successfully.');
        } else {
            return redirect()->route('contact.index')->with('error', 'contact not found.');
        }
    }
    public function delete($id){
        $contact = Contact::withTrashed()->find($id);

        if ($contact) {
            $contact->forceDelete();
            return redirect()->route('contact.index')->with('success', 'contact restored successfully.');
        } else {
            return redirect()->back()->with('error', 'contact not found.');
        }
    }
}

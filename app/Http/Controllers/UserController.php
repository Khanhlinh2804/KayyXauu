<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
// use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderByDesc('id','desc')->search()->paginate(10);
        return view('admin.user.list',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ([
            'name' => 'required|max:255|min:5',
            'email' => 'required|unique:users|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'password' => 'required|max:30|min:8',
        ]);

        if ($request->hasFile('image')) {
            $file_name = time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads'), $file_name);
        } else {
            $file_name = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
        }
        
        $password = Hash::make($request->password);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $file_name,
            'status' => $request->status,
            'password' => $password,
        ]);
        return redirect()->route('user.index')->with('success', 'Add user Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $user = User::find($id);
            if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $rules = ([
            'name' => 'required|max:255|min:5',
            'email' => 'required|email',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'password' => 'required|max:30|min:8',

        ]);
        $request->validate($rules);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $file_name = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $file_name);
        } else {
            
            $file_name = 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png';
        }
        $password = $user->password;
        if (Hash::check($request->password, $user->password)) {
            $password = Hash::make($request->password);
        } else {
            return redirect()->back()->with('error', 'The Old Password does not match');
        }
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' =>$file_name,
            'password' => $password,
            'status' => $request->status,
            'phone' => $request->phone
        ]);

        return redirect()->route('user.index')->with('success', "Update Data Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('user.index')->with('success','Delete user Successfully');
    }
    public function trashed()
    {
        $user = User::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.user.trash', compact('user'));
    }

    public function restore($id){
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->restore();
            return redirect()->route('user.index')->with('success', 'User restored successfully.');
        } else {
            return redirect()->route('user.index')->with('error', 'User not found.');
        }
    }
    public function delete($id){
        $user = User::withTrashed()->find($id);

        if ($user) {
            $user->forceDelete();
            return redirect()->back()->with('success', 'User restored successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

    // public function login()
    // {

    //     return view('frontend.pages.login');
    // }


    // public function signin(Request $request)
    // {
    //     $user = request()->only(['email', 'password']);
    //     $token = Auth::attempt($user);
    //     if ($token) {
    //         return back()->with('success','Login successfully');
    //     } else {
    //         return back()->with('error', 'Invalid credentials');
    //     }
    // }
    // public function signup(){
    //     return view('frontend.pages.register');
    // }
    // public function register(Request $request)
    // {
    //     $user = new User();
        
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->phone = $request->phone;
    //     $user->password =Hash::make($request->password);
        
    //     $user->save();
    //     return redirect()->route('login')->with('success','Register successfully');
    // }
    // public function logout()
    // {
    //     $logout = Auth::logout();
    //     if($logout){
    //         return redirect()->route('home')->with('success', 'logout success');
    //     }else{
    //         return redirect()->back();
    //     }
    // }
    

}

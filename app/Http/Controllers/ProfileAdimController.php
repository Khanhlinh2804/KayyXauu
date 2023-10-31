<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\{User,Order,Order_detail,Product};

class ProfileAdminController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request ): View
    {
        // dd($request->user()->name);
        $admin =  Auth::guard('admin');
        // $user = User::with('orders_user')->find($id);
        // dd($user->orders);
        return view('admin.profile.edit', compact('admin'));
    }
    public function edit(Request $request): View
    {
        // dd($request->user()->name);
        $user = $request->user();
        return view('frontend.profile.partials.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.index')->with('success', 'profile updated infomation ');

        
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
}

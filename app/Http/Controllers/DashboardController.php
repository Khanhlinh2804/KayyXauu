<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Product,Order, Order_detail,Comment};


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::inRandomOrder()->orderBy('id', 'DESC')->limit(10)->get();
        $totalproduct = Product::count();
        $ordertotal = Order_detail::count();
        $comment = Comment::count();
        $orders = Order::inRandomOrder()->with('detail')->limit(15)->get();
        // dd(Auth::guard("admin"));
        return view('admin.dashboard.index',compact('user','ordertotal','comment','orders','totalproduct'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

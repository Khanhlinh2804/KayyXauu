<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Order,Order_detail};
// use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $order = Order::with('DataCity','district')->orderByDesc('id','desc')->search()->paginate(8);
        return view('admin.order.list', compact('order','user'));
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
        $order = Order::with('DataCity','district','order_detail')->find($id);
        // $cart = Order_detail::with('products')->find($id);
        // dd($order->order_detail);
        return view('admin.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->update([
                'status' => $request->status
            ]);
            return redirect()->route('order.index')->with('success', 'Update cart successfully');
        }
        return redirect()->route('order.index')->with('error', 'Update cart Unsuccessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id)->delete();
        return redirect()->back()->with('success','delete successfully');
    }
    public function trashed()
    {
        $order= order::onlyTrashed()->with('DataCity','district','order_detail')->orderByDesc('id','desc')->paginate(10);

        return view('admin.order.trash', compact('order'));
    }

    public function restore($id){
        $order = order::withTrashed()->find($id);

        if ($order) {
            $order->restore();
            return redirect()->route('order.index')->with('success', 'order restored successfully.');
        } else {
            return redirect()->route('order.index')->with('error', 'order not found.');
        }
    }
    public function delete($id){
        $order = order::withTrashed()->find($id);

        if ($order) {
            $order->forceDelete();
            return redirect()->route('order.index')->with('success', 'Authoorderr restored successfully.');
        } else {
            return redirect()->back()->with('error', 'order not found.');
        }
    }
}

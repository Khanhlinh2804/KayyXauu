<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order,Order_detail,Product,City,District,User};
// use App\Models\Product;
// use App\Models\City;
// use App\Models\District;
// use App\Models\User;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function cart()
    {

        return view('frontend.cart.cart');
    }
    public function Addcart($id)
    {
        
        $product = Product::findOrFail($id);
        
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quatity']++;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                "quatity" => 1,
                "price" => $product->price,
                "sale_price" => $product->sale_price,
                "images" => $product->images,
            ];
            

        }
        // dd($product);
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Add to cart successfully');
    }

    public function RemoveCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // dd($cart);
            session()->flash('success', 'Delete item successfully');  
            
        }
    }
    public function UpdateCart(Request $request){
        if($request->id && $request->quatity){
            $cart = session()->get('cart');
            $cart[$request->id]["quatity"] = $request->quatity;
            session()->put('cart', $cart);
            session()->flash('success', 'Update Cart successfully!');
        }

    }

    public function ClearCart()
    {
        
    }
    public function create()
    {
        if(Auth::check() == false){
            return redirect()->route('login')->with('success', 'You must login in to continue shopping');
        }
        $city = City::get('name','id');
        $district = District::get('name','id');
        // $distrit = District
        return view('frontend.cart.checkout',compact('city','district'));
    }
    
    public function success(){
        return view('frontend.cart.payment-success');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function district(Request $request)
    {
        $data['districts'] = District::where('city_id',$request->city_id)->get(['name','id']);
        return response()->json($data);
    }


    public function store(Request $request)
    {
        $cart = session()->get('cart');
        $data = $request->only(
            'name', 'lastname','address', 'city', 'districts', 'phone', 'payment', 'email', 'note', 'status', 'user_id'
        );
        
        $order = Order::create($data);
        // $order = Order::create([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'address' => $request->address,
        //     'city' => $request->city,
        //     'districts' => $request->districts,
        //     'phone' => $request->phone,
        //     'payment' => $request->payment,
        //     'email' => $request->email,
        //     'note' => $request->note,
        //     'status' => $request->status,
        //     'user_id' => $request->user_id,
        // ]);

        if ($order) {
            foreach ($cart as $value) {
                $detail = [
                    'price' => $value['price'],
                    'quantity' => $value['quantity'], 
                    'order_id' => $order->id, 
                    'product_id' => $value['id']
                ];

                Order_detail::create($detail);
            }
            session()->forget('cart');

            return redirect()->route('cart.success');
        } else {
            return redirect()->route('cart.error');
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

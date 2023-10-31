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
        if ($product) {
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
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Add to cart successfully');
        }
        else{
            return redirect()->back()->with('error', 'Add to cart Unsuccessfully');
        }
        
    }

    public function RemoveCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
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

    public function create()
    {
        if(Auth::check() == false){
            return redirect()->route('login')->with('success', 'You must login in to continue shopping');
        }
        $city = City::select('id','name')->get();
        // dd($city);
        $district = District::get('name','id');
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
        // dd($request->all());
        $cart = session()->get('cart');
        $data = $request->only([
            'name', 'lastname','address', 'city', 'districts', 'phone', 'payment', 'email', 'note', 'status', 'user_id'
        ]);
        // dd($data);
        $order = Order::create($data);
        if ($order) {
            foreach ($cart as $key=> $value) {
                $detail = [
                    'price' => $value['price'],
                    'quantity' => $value['quatity'], 
                    'order_id' => $order->id, 
                    'product_id' => $key
                ];

                Order_detail::create($detail);
            }
            session()->forget('cart');

            return redirect()->route('cart.success')->with('success', ' Add to cart successfully');
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

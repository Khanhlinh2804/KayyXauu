<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\View;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product =  Product::with('category')->orderByDesc('name','desc')->search()->paginate(5);
        return view('admin.product.list', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255|min:5',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'color' => 'required',
            'description' => 'required',
            'summary' => 'required|max:200'
        ]);
        $file_name = time() . $request->file('images')->getClientOriginalName();
        $request->file('images')->move(public_path('uploads'), $file_name);

        Product::create([
            'name' => $request->name,
            'images' => $file_name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'status' => $request->status,
            'quatity' => $request->quatity,
            'color' => $request->color,
            'description' => $request->description,
            'summary' => $request->summary,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Create Product Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    public function detail($id)
    {
        $random = Product::inRandomOrder()->limit(4)->get();
        $product = Product::with('category')->find($id);
        return view('frontend.pages.detail-product', compact('product','random'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $category= Category::pluck('name', 'id');; //chỉ lấy mỗi name trong bảng category
        return view('admin.product.update', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $file_name = $product->images;
        if($request->has('images')){
            $file_name = time() . $request->images->getClientOriginalName();
            $request->images->move(public_path('uploads'), $file_name); 
        }
        $product->update([
            'name'=> $request->name,
            'images' => $file_name,
            'price' =>$request->price,
            'sale_price' =>$request->sale_price,
            'status' => $request->status,
            'quatity' =>$request->quatity,
            'color' =>$request->color,
            'description'=> $request->description,
            'summary' => $request->summary,
            'category_id'=> $request->category_id,
        ]);
        return redirect()->route('product.index')->with('success','Update Product SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Delete Product Successfully');
    }

    public function trashed()
    {
        $product= Product::onlyTrashed()->orderByDesc('id','desc')->paginate(10);

        return view('admin.product.trash', compact('product'));
    }

    public function restore($id){
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->restore();
            return redirect()->back()->with('success', 'product restored successfully.');
        } else {
            return redirect()->route('product.index')->with('error', 'product not found.');
        }
    }
    public function delete($id){
        $product = Product::withTrashed()->find($id);

        if ($product) {
            $product->forceDelete();
            return redirect()->route('product.index')->with('success', 'Authoproductr restored successfully.');
        } else {
            return redirect()->back()->with('error', 'product not found.');
        }
    }
}

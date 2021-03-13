<?php

namespace App\Http\Controllers;
use App\Product;
use App\Brand;

use File;
use Image;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(4);
        return view('productindex', compact('products'))->with('i', (request()->input('page', 1) - 1) * 4);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();

        return view('productcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = Brand::all();

        $request->validate([
            'product_name'=>'required',
            'product_desc'=>'required',
            'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg', //|max:2048
            'product_price'=>'required',
            'quantity'=>'required',
            'size'=>'required',
            'uploaded_by'=>'required',
            'cat_id'=>'required',
            'brand_id'=>'required',

        ]);

        $imageName = '';
        if ($request->product_image) {
            $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('image/product'), $imageName);
        }

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->quantity = $request->quantity;
        $product->size = $request->size;
        $product->uploaded_by = $request->uploaded_by;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->product_image = $imageName;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product has been Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('productshow', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('productedit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'=>'required',
            'product_desc'=>'required',
            'product_price'=>'required',
            'quantity'=>'required',
            'size'=>'required',
            'uploaded_by'=>'required',
            'cat_id'=>'required',
            'brand_id'=>'required',

        ]);

        $imageName = '';
        if ($request->product_image) {
            $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('image/product'), $imageName);
        }

        $product = new Product();

        $product->product_name = $request->product_name;
        $product->product_desc = $request->product_desc;
        $product->product_price = $request->product_price;
        $product->quantity = $request->quantity;
        $product->size = $request->size;
        $product->uploaded_by = $request->uploaded_by;
        $product->cat_id = $request->cat_id;
        $product->brand_id = $request->brand_id;
        $product->product_status = $request->product_status;
        $product->discount_price = $request->discount_price;
        //$product->product_image = $imageName;
        $product->update();
        return redirect()->route('product.index')->with('success', 'Product has been Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('danger', 'Product has been Deleted successfully.');

    }
}

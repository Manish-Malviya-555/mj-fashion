<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;
use File;
use Image;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $brands = Brand::latest()->paginate(4);
        return view('brandindex', compact('brands'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brandcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name'=>'required',
            'brand_desc'=>'required',
            'brand_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg', //|max:2048
        ]);

        $imageName = '';
        if ($request->brand_image) {
            $imageName = time() . '.' . $request->brand_image->extension();
            $request->brand_image->move(public_path('image/brand'), $imageName);
        }

        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_image = $imageName;
        $brand->save();
        return redirect()->route('brand.index')->with('success', 'Brand has been Added successfully.');

    }
        
       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('brandshow', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search = $request->get('search');
        $brands = DB::table('brands')->where('brand_name','like','%'.$search.'%')->paginate(4);
        return view('brandindex');
    }

    public function edit(Brand $brand)
    {
        return view('brandedit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name'=>'required',
            'brand_desc'=>'required',
        ]);

        $imageName = '';
        if ($request->brand_image) {
            $imageName = time() . '.' . $request->brand_image->extension();
            $request->brand_image->move(public_path('image/brand'), $imageName);
        }

        // $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->brand_image = $imageName;
        $brand->update();
        return redirect()->route('brand.index')->with('danger', 'Brand has been Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand has been Deleted successfully.');

    }
}

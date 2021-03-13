<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use File;
use Image;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(4);
        return view('categoryindex', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorycreate');
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
            'category_name'=>'required',
            'category_desc'=>'required',
            'category_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg', //|max:2048
        ]);

        $imageName = '';
        if ($request->category_image) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('image/category'), $imageName);
        }

        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_image = $imageName;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category has been Added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categoryshow', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categoryedit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
        $request->validate([
            'category_name'=>'required',
            'category_desc'=>'required',
        ]);

        $imageName = '';
        if ($request->category_image) {
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('image/category'), $imageName);
        }

        // $brand = new Brand();

        $category->category_name = $request->category_name;
        $category->category_desc = $request->category_desc;
        $category->category_status = $request->category_status;
        $category->category_image = $imageName;
        $category->update();
        return redirect()->route('category.index')->with('success', 'Category has been Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('danger', 'Category has been Deleted successfully.');

    }
}

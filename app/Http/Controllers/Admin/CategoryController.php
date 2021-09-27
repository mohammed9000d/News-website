<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            // 'image' => 'required|image',
            'description' => 'required|string'
        ]);
        // if ($request->hasFile('image')) {
        //     $categoryImage = $request->file('image');
        //     $name = time() . '_' . $categoryImage->getClientOriginalExtension();
        //     $categoryImage->move('images/category', $name);
        // }
        $category = Category::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            // 'image' => $name,

        ]);
        if($category) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Category created successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to create category');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrfail($id);
        return view('admin.categories.edit', ['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|integer|exists:categories,id',
            'name' => 'required|string|min:3|max:20',
            // 'image' => 'required|image',
            'description' => 'required|string'
        ]);
        // if ($request->hasFile('image')) {
        //     $categoryImage = $request->file('image');
        //     $name = time() . '_' . $categoryImage->getClientOriginalExtension();
        //     $categoryImage->move('images/category', $name);
        // }
        $category = Category::find($id);
        $category->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            // 'image' => $name,

        ]);
        if($category) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Category updated successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to update category');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Category::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Category deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete category',
                'icon'=>'error'
            ]);

        }
    }
}

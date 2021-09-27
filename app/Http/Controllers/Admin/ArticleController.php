<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $articles = Article::Search($request)->orderBy('created_at', 'DESC')->get();
        $categories = Category::get();
        return view('admin.articles.index', [
            'articles'=>$articles,
            'categories'=>$categories
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::where('status', '=', 'Active')->get();
        return view('admin.articles.create', ['categories'=>$categories]);
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
            'title' => 'required|string|min:3|max:20',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|image',
            'short_description' => 'required|string',
            'full_description' => 'required|string'
        ]);
        if ($request->hasFile('image')) {
            $adminImage = $request->file('image');
            $name = time() . '_' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/category', $name);
        }
        $article = Article::create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'short_description' => $request->get('short_description'),
            'full_description' => $request->get('full_description'),
            'image' => $name,
            'status' => $request->has('status')? 'Active':'InActive'
        ]);
        if($article) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Article created successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to create article');
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
        $categories = Category::where('status', '=', 'Active')->get();
        $article = Article::findOrfail($id);
        return view('admin.articles.edit', [
            'article'=>$article,
            'categories'=>$categories
        ]);
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
            'id'=>'required|integer|exists:articles,id',
            'title' => 'required|string|min:3|max:20',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'required|image',
            'short_description' => 'required|string',
            'full_description' => 'required|string'
        ]);
        if ($request->hasFile('image')) {
            $articleImage = $request->file('image');
            $name = time() . '_' . $articleImage->getClientOriginalExtension();
            $articleImage->move('images/category', $name);
        }
        $article = Article::create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
            'short_description' => $request->get('short_description'),
            'full_description' => $request->get('full_description'),
            'image' => $name,

        ]);
        if($article) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Article updated successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to update article');
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
        $isDeleted = Article::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Article deleted successfully',
                'icon'=>'success'
            ]);

        }else{
            return response()->json([
                'title'=>'Failed',
                'text'=>'Failed to delete article',
                'icon'=>'error'
            ]);

        }
    }
}

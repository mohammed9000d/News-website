<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeContreoller extends Controller
{
    //
    public function home() {
        $news_articles = Article:: orderBy('created_at', 'DESC')->take(3)->get();
        $articles = Article::take(3)->get();
        $categories = Category::all();
        $sport_articles = Article::whereHas('category', function($query) {
            $query->where('id', '=', 5);
        })->get();
        return view('front.index', [
            'news_articles' => $news_articles,
            'articles' => $articles,
            'categories' => $categories,
            'sport_articles' => $sport_articles
        ]);
    }

    public function category($id) {
        $category = Category::findOrfail($id);
        $articles = Article::whereHas('category', function($query) use($id){
            $query->where('id', '=', $id);
        })->get();
        return view('front.category', [
            'category' => $category,
            'articles' => $articles
        ]);
    }

    public function article($id) {
        $article = Article::findOrfail($id);
        return view('front.article', ['article' => $article]);
    }

    public function contact() {
        return view('front.contact');
    }

    public function message(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:25',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        $message = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        if($message) {
            session()->flash('alert-type', 'alert-success');
            session()->flash('message', 'Sent message successfully');
            return redirect()->back();
        }else {
            session()->flash('alert-type', 'alert-danger');
            session()->flash('message', 'faild to sent message');
            return redirect()->back();
        }
    }
}

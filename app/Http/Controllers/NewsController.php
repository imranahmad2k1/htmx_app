<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    protected $news;

    public function __construct(){
        $this->news = new News();
    }

    public function createNews(Request $request){
        $validated = $request->validate([
            'news' => 'required',
        ]);

        $news = $this->news->create([
            'news' => $validated['news'],
        ]);


    }

    public function getTitle(){
        return "Welcome to News Page with HTMX";
    }


    public function getNews(){
        $news = $this->news->getAllNews();

        return view('load_news', compact('news'))->render();
    }
}

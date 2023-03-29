<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index (){
        $articles = Article::all();

       // dd($articles);

        return view('news.index',['articles'=> $articles]);
    }
}

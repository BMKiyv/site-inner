<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;

class AdminNewsController extends Controller
{
    public function index () {
        $news = Article::all();
        return view('admin.news',['news'=>$news]);
    }
    public function show () {
        
    }
}
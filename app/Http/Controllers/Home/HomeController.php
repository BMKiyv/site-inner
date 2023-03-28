<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('isadmin');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $month_now = Carbon::now()->format('m');
        $users = User::whereMonth('birthday', '>=', $month_now)
        ->get();
        $news = Article::all();
        $departments = Department::all();
        return view('home.index',['user'=> $users,'news'=>$news, 'departments'=> $departments]);
    }

}

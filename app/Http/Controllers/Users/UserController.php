<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->pluck('name','id');
        //dd($users);
        return view('cabinet.index',['users'=>$users]);
    }
    public function show ($user) {
        $user_obj = User::where('name', $user)->first();
        return view('user.index',['user'=>$user_obj]);
    }
}

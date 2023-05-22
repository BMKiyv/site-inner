<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        $users = User::all();
        return view('admin.users',['users'=>$users]);
    }
    public function edit ($id) {
        $user = User::where('id',$id)->first();
        //dd('this is working',$user);
        return view('admin.user_edit',['user'=>$user]);
    }
    public function show ($id) {
        $user = User::where('id',$id)->first();
        //dd('this is working',$user);
        return view('admin.user',['user'=>$user]);
    }
    public function update (Request $request) {
        $user = User::where('id',$request->user)->first();
        $user->name = $request->input('user-name');
        $user->position = $request->input('user-position');
        $user->birthday = $request->input('user-birthday');
        $user->phone = $request->input('user-phone');
        $user->email = $request->input('user-email');
        $user->save();
        return redirect(route('user.show',['user'=>$user->id]));
    }
}
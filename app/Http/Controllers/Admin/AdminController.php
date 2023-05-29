<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index () {
        $users = User::all();
        $departments = Department::all();
        return view('admin.users.users',['users'=>$users,'departments'=>$departments]);
    }

    public function show ($id) {
        $departments = Department::all();
        $user = User::where('id',$id)->first();
        return view('admin.users.user',['user'=>$user,'departments'=>$departments]);
    }

    public function edit ($id) {
        $user = User::where('id',$id)->first();
        $departments = Department::all();
        return view('admin.users.user_edit',['user'=>$user,'departments'=>$departments]);
    }

    public function update (Request $request) {
        $user = User::where('id',$request->user)->first();
        $validated = $request->validate([
            'user-name' => 'required',
            'user-position' => 'required',
            'user-birthday' => 'required',
            'user-phone' => 'required',
            'user-email' => 'required',
            'user-department' => 'required',
        ]);
        $user->name = $validated['user-name'];
        $user->position = $validated['user-position'];
        $user->birthday = $validated['user-birthday'];
        $user->phone = $validated['user-phone'];
        $user->email = $validated['user-email'];
        $validated['user-department'] =='not_changed'? null: $user->department_id = $validated['user-department'] ;
        $user->save();
        return redirect(route('user.show',['user'=>$user->id]));
    }

    public function destroy ($id) {

        $user = User::where('id', $id)->firstOrFail();
         $user->delete();
         return redirect(asset('/admin'));
    }
}
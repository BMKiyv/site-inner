<?php

namespace App\Http\Controllers\Departments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;

class DepartmentsController extends Controller
{
    public function show ($department){
        $dep = Department::where('name',$department)->get();
        $staff = User::where('department_id',$dep[0]->id)->get();

        //dd($department, $dep, $staff);

        return view('departments.department',['users'=>$staff, 'department'=>$dep[0]]);
    }
}

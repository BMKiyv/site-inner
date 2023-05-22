<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;

class AdminProjectsController extends Controller
{
    public function index () {
        $projects = Project::all();
        return view('admin.projects',['projects'=>$projects]);
    }
    public function show () {
        
    }
}
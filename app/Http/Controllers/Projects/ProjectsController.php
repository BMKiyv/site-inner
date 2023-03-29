<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function index (Request $request) {

        return (string) Project::pluck('title');
    }
    public function show ($project){
        $item = Project::where('title',$project)->get();
        //dd($item);
        return view('projects.project',['project'=>$item[0]]);
    }

}

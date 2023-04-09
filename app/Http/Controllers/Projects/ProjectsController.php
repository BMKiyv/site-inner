<?php

namespace App\Http\Controllers\Projects;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Document;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function index (Request $request) {
        $projects = Project::pluck('title');
        $document_tags = Document::pluck('title');
        $header_response = [$projects,$document_tags];
        //dd($projects,$document_tags,$header_response);
       // return (string) $header_response;
       // return (string) Project::pluck('title');
       return response()->json([$projects,$document_tags]);
    }
    public function show ($project){
        $item = Project::where('title',$project)->get();
        //dd($item);
        return view('projects.project',['project'=>$item[0]]);
    }

}

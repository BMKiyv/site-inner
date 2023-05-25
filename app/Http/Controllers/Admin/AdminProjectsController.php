<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectsController extends Controller
{
    public function index () {
        $projects = Project::all();
        return view('admin.projects.index',['projects'=>$projects]);
    }
    public function show ($id) {
        $project = Project::where('id',$id)->first();
        return view('admin.projects.project',['project'=>$project]);
    }
    public function create (){
        return view('admin.projects.project_create');
    }
    public function store (Request $request){
        $project = new Project();
        $validated = $request->validate([
            'project-title'=> 'required',
            'project-mission'=> 'required',
            'project-aim'=> 'required'
        ]);
        $project->title = $validated['project-title'];
        $project->mission = $validated['project-mission'];
        $project->aim = $validated['project-aim'];
        $project->save();
        return redirect(route('projects.show',['project'=>$project->id]));
    }
    public function edit ($id){
        $project = Project::where('id',$id)->first();
        return view('admin.projects.project_edit',['project'=>$project]);
    }   
    public function update (Request $request) {
        //dd($request);
        $project = $request->project? Project::where('id',$request->project)->first(): new Project();
        $validated = $request->validate([
            'project-title'=> 'required',
            'project-mission'=> 'required',
            'project-aim'=> 'required'
        ]);
        $project->title = $validated['project-title'];
        $project->mission = $validated['project-mission'];
        $project->aim = $validated['project-aim'];
        $project->save();
        return redirect(route('projects.show',['project'=>$project->id]));
    }
    public function destroy ($id) {

        $project = Project::where('id', $id)->firstOrFail();
         $project->delete();
         return redirect(route('projects.index'));
    }
}
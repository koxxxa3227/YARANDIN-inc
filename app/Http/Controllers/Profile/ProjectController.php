<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        $me = Auth::user();
        $projects = Project::with('tasks')->paginate(20);

        return view('profile.home', compact('projects'));
    }

    public function overview($id){
        $project = Project::whereUserId(Auth::id())->findOrFail($id);

        return view('profile.projects.overview', compact('project'));
    }

    public function create(){
        $project = new Project();

        return view('profile.projects.form', compact('project'));
    }

    public function edit($id){
        $project = Project::whereUserId(Auth::id())->findOrFail($id);

        return view('profile.projects.form', compact('project'));
    }

    public function save(Request $request){
        $this->validate($request, [
            'description' => 'required|min:1|string'
        ]);
        if($request->project_id){
            $project = Project::whereUserId(Auth::id())->findOrFail($request->project_id);
        } else {
            $project = new Project();
            $project->user_id = Auth::id();
        }

        $project->description = $request->description;

        $project->save();

        return redirect()->route('home');
    }

    public function delete($id){
        $project = Project::findOrFail($id);

        $project->tasks()->delete();
        $project->delete();

        return redirect()->route('home');
    }
}

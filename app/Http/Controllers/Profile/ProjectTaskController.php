<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ProjectTask;
use App\Models\ProjectTaskFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectTaskController extends Controller
{
    public function overview($id)
    {
        $task = ProjectTask::findOrFail($id);

        return view('profile.projects.tasks.overview', compact('task'));
    }

    public function create($project_id)
    {
        $task = new ProjectTask();

        return view('profile.projects.tasks.form', compact('project_id', 'task'));
    }

    public function edit($id)
    {
        $task = ProjectTask::findOrFail($id);
        $project_id = $task->project_id;

        return view('profile.projects.tasks.form', compact('project_id', 'task'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:1|max:255|string',
            'description' => 'required|min:1|string'
        ]);
        if ($request->id) {
            $task = ProjectTask::whereProjectId($request->project_id)->findOrFail($request->id);
        } else {
            $task = new ProjectTask();
            $task->project_id = $request->project_id;
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->status_id = $request->status_id;
        $task->save();

        if ($request->file) {
            $file = new ProjectTaskFile();
            $file->project_task_id = $task->id;
            $file->path = $request->file->store('files');
            $file->save();
        }

        return redirect()->route('project-overview', $task->project_id);
    }

    public function delete($id)
    {
        $task = ProjectTask::findOrFail($id);
        $project_id = $task->project_id;

        if ($task->file) {
            Storage::delete('app/public/' . $task->file->path);
        }

        $task->delete();

        return redirect()->route('project-overview', $project_id);
    }
}

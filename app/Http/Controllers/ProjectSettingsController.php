<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectSettingsController extends Controller
{
    //
    public function settings() {
        return view('projectsettings', [
            'project' => Project::where('owner', Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $project = Project::find(Auth::user()->id);
        $project->name = $validated['name'];
        $project->save();

        return redirect(route('projectsettings'))->with('status', 'Project name changed!');
    }
}

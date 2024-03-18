<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\UrlParam;

class ProjectController extends Controller
{
    #[Endpoint('List all projects')]
    public function index()
    {
        return response()->json(Project::all());
    }

    #[Endpoint('Retrieve project')]
    #[UrlParam(name: 'id', type: 'integer', description: 'The ID of the project.', example: 1)]
    public function show(int $id)
    {
        $project = Project::with(['owner', 'members', 'tasks', 'tasks.workIntervals', 'tasks.owner'])->find($id);

        if (!$project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return response()->json($project);
    }

    #[Endpoint('Create project')]
    #[BodyParam(name: 'title', type: 'string', description: 'The title of the project.', example: 'My project')]
    #[BodyParam(name: 'owner_id', type: 'integer', description: 'The ID of the owner of the project.', example: 1)]
    #[BodyParam(name: 'description', type: 'string', description: 'The description of the project.', required: false, example: 'This is a project.')]
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'owner_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
        ]);

        $validated = $request->only('title', 'owner_id', 'description');

        $project = Project::create($validated);

        return response()->json($project, 201);
    }
}

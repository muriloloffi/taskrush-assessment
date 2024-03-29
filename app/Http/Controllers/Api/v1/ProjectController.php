<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
}

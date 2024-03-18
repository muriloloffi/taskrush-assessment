<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\WorkInterval;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\BodyParam;
use Knuckles\Scribe\Attributes\Endpoint;

class WorkIntervalController extends Controller
{
    #[Endpoint(title: 'New work interval', description: 'Start a new work interval for a given user and task')]
    #[BodyParam(name: 'user_id', type: 'integer', description: 'The ID of the user.', example: 1)]
    #[BodyParam(name: 'task_id', type: 'integer', description: 'The ID of the task.', example: 1)]
    public function start(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'task_id' => 'required|integer|exists:tasks,id',
        ]);

        $validated = $request->only('user_id', 'task_id');

        WorkInterval::where('user_id', $validated['user_id'])
            ->whereNull('end')
            ->update(['end' => now()]);

        $startedWorkInterval = WorkInterval::create([
            'user_id' => $validated['user_id'],
            'task_id' => $validated['task_id'],
            'start' => now(),
        ]);

        if (!$startedWorkInterval) {
            return response()->json(
                ['message' => 'Failed to start work interval'],
                500
            );
        }

        return response()->json(
            ['message' => 'Work interval started'],
            200
        );
    }

    #[Endpoint(title: 'Stop work interval', description: 'Stop a new work interval for a given user')]
    #[BodyParam(name: 'user_id', type: 'integer', description: 'The ID of the user.', example: 1)]
    public function stop(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $validated = $request->only('user_id');

        /** @var WorkInterval $workInterval */
        $workInterval = WorkInterval::where('user_id', $validated['user_id'])
            ->whereNull('end')
            ->first();
        if (!$workInterval) {
            return response()->json(
                ['message' => 'No ongoing work interval'],
                400
            );
        }

        $workInterval->update(['end' => now()]);

        return response()->json(
            ['message' => 'Work interval stopped'],
            200
        );
    }
}

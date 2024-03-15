<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\WorkInterval;
use Illuminate\Http\Request;

class WorkIntervalController extends Controller
{

    public function start(Request $request)
    {
        // get the authenticated user and the task id from the body of the
        // request and use them to create a new work interval. If the user owns
        // any ongoing work interval, it will be stopped before starting a new
        // one.
//        $user = auth()->user();
        $user = User::findOrFail($request->only('user_id')['user_id']);
        $task = Task::findOrFail($request->only('task_id')['task_id']);
        WorkInterval::where('user_id', $user->id)
            ->whereNull('end')
            ->update(['end' => now()]);

        $startedWorkInterval = WorkInterval::create([
            'user_id' => $user->id,
            'task_id' => $task->id,
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

    public function stop()
    {
        // Get the authenticated user and use it to stop the ongoing work
        // interval.
        $user = auth()->user();
        /** @var WorkInterval $workInterval */
        $workInterval = WorkInterval::where('user_id', $user->id)
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

<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\WorkInterval;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $projects = Project::factory(2)->create();
        $tasks = [];
        foreach ($projects as $project) {
            $projectTasks = Task::factory(3)->withProject($project)->create();
            $tasks = Arr::collapse([$tasks, $projectTasks]);
        }
        foreach ($tasks as $task) {
            WorkInterval::factory(3)->withTask($task)->create();
        }
    }
}

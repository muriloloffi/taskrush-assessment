<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $project = Project::factory()->create();

        return [
            'title' => fake()->text(100),
            'description' => fake()->text(300),
            'project_id' => $project->id,
            'owner_id' => $project->owner->id,
        ];
    }
}

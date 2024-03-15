<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
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
        return [
            'title' => fake()->text(100),
            'description' => fake()->text(300),
        ];
    }

    public function withProject(Project $project): self
    {
        return $this->state([
            'project_id' => $project->id,
            'owner_id' => $project->owner->id,
        ]);
    }
}

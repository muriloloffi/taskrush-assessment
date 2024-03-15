<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkInterval>
 */
class WorkIntervalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTime();
        $end = (clone $start)->add(new DateInterval('PT1H'));

        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    public function withTask(Task $task): self
    {
        return $this->state([
            'task_id' => $task->id,
            'user_id' => $task->owner->id,
        ]);
    }
}

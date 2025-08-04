<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'task_name' => 'Task 1',
                'due_time' => '2025-08-01 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Task 2',
                'due_time' => '2025-08-02 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'task_name' => 'Task 3',
                'due_time' => '2025-08-03 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_name',
        'due_time',
        'is_deleted',
    ];

    public static function getActiveTasks()
    {
        return self::where('is_deleted', false)->get();
    }

    public static function markAsDeleted($id)
    {
        $task = self::find($id);
        $task->is_deleted = true;
        $task->save();

        return $task;
    }
}

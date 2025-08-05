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

    public static function getTrashedTasks()
    {
        return self::where('is_deleted', true)->get();
    }

    public static function recoverTask($id)
    {
        $task = self::find($id);
        $task->is_deleted = false;
        $task->save();

        return $task;
    }

    public static function deleteTrashTaskPermanently()
    {
        return self::where('is_deleted', true)->delete();
    }
}

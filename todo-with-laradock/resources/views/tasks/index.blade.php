<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Todoリスト</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Todoリスト</h1>
            <a href="{{ route('tasks.viewTrash') }}" class="bg-gray-300 p-2 rounded mb-2">ゴミ箱</a>
        </nav>

        <form action="{{ route('tasks.store') }}" method="post">
            @csrf
            <div class="flex mb-2">
                <input type="text" name="task_name" class="border border-gray-300 p-2 w-full" placeholder="タスク名">
                <input type="datetime-local" name="due_time" class="border p-2 ml-2" placeholder="期限">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">追加</button>
            </div>
        </form>
    </div>

    <ul class="list-disc px-5 text-sm">
        @foreach ($tasks as $task)
            <li class="flex justify-between mb-2">
                <p>{{ $task->task_name }}: <span class="text-xs text-gray-500 ml-2">{{ $task->due_time }}</span></p>
                <div>
                    <form action="{{ route('tasks.markAsDeleted', $task->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Done</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>

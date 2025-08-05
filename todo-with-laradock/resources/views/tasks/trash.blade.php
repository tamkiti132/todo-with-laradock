<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Todoリスト-ゴミ箱</title>
</head>
<body class="bg-gray-300">
    <div class="container mx-auto p-4">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">ゴミ箱</h1>
            <a href="{{ route('tasks.index') }}" class="border border-blue-500 hover:bg-blue-700 hover:text-white p-2 rounded mb-2">Top</a>
        </nav>
        <ul class="list-disc pl-5">
            @foreach ($tasks as $task)
                <li class="mb-2 flex justify-between">
                    <span>{{ $task->task_name }}</span>
                    <form action="{{ route('tasks.recover', $task->id) }}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" onclick="return confirm('このタスクは復元しますか？')" class="bg-green-500 text-white px-2 py-1 rounded">復元</button>
                    </form>
                </li>
            @endforeach
            @if(count($tasks) > 0)
                <form action="{{ route('tasks.deleteTrash') }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('ゴミ箱を空にしますか？')" class="bg-red-500 text-white px-2 py-1 rounded">ゴミ箱を空にする</button>
                </form>
            @endif
        </ul>
        @if($tasks->isEmpty())
            <p class="text-center">ゴミ箱は空です。</p>
        @endif
    </div>
</body>

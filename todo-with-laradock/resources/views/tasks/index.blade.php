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

        </nav>
    </div>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->task_name }}</li>
        @endforeach
    </ul>
</body>
</html>

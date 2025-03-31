<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Task Manager</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Sortable.js for drag and drop functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-6">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Task Manager</h1>
        </header>
        
        <nav class="mb-6">
            <ul class="flex space-x-4">
                <li><a href="{{ route('tasks.index') }}" class="text-blue-600 hover:text-blue-800">Tasks</a></li>
                <li><a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800">Projects</a></li>
            </ul>
        </nav>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </div>
</body>
</html>
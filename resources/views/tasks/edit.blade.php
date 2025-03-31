@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Edit Task</h2>
        
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Task Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    value="{{ $task->name }}" 
                    class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>
            
            <div class="mb-6">
                <label for="project_id" class="block text-sm font-medium text-gray-700 mb-1">Project</label>
                <select 
                    name="project_id" 
                    id="project_id"
                    class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex space-x-2">
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Update Task
                </button>
                <a 
                    href="{{ route('tasks.index', ['project_id' => $task->project_id]) }}" 
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
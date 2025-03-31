@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Tasks</h2>
            
            <div>
                <form action="{{ route('tasks.index') }}" method="GET" class="flex space-x-2">
                    <select 
                        name="project_id" 
                        class="border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        onchange="this.form.submit()"
                    >
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ $selectedProject && $selectedProject->id == $project->id ? 'selected' : '' }}>
                                {{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        
        @if($projects->isEmpty())
            <div class="text-center py-6 text-gray-500">
                <p>You need to create a project first</p>
                <a href="{{ route('projects.index') }}" class="text-blue-600 hover:text-blue-800 underline mt-2 inline-block">
                    Go to Projects
                </a>
            </div>
        @else
            <form action="{{ route('tasks.store') }}" method="POST" class="mb-8">
                @csrf
                <input type="hidden" name="project_id" value="{{ $selectedProject ? $selectedProject->id : '' }}">
                <div class="flex space-x-2">
                    <input 
                        type="text" 
                        name="name" 
                        placeholder="Task name" 
                        class="flex-1 border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required
                    >
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        Add Task
                    </button>
                </div>
            </form>
            
            <div id="task-list" class="space-y-2" data-project-id="{{ $selectedProject ? $selectedProject->id : '' }}">
                @foreach($tasks as $task)
                    <div 
                        class="p-4 bg-gray-50 border border-gray-200 rounded shadow-sm flex justify-between items-center cursor-move"
                        data-id="{{ $task->id }}"
                    >
                        <div>
                            <span class="font-semibold mr-2">#{{ $task->priority }}</span>
                            <span>{{ $task->name }}</span>
                        </div>
                        <div class="flex space-x-2">
                            <a 
                                href="{{ route('tasks.edit', $task) }}" 
                                class="text-blue-600 hover:text-blue-800"
                            >
                                Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="text-red-600 hover:text-red-800"
                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                @if($tasks->isEmpty())
                    <div class="text-center py-6 text-gray-500">
                        No tasks found. Add one to get started.
                    </div>
                @endif
            </div>
        @endif
    </div>

    <script>
        // Setup Sortable.js for drag and drop functionality
        document.addEventListener('DOMContentLoaded', function() {
            const taskList = document.getElementById('task-list');
            
            if (taskList) {
                const projectId = taskList.dataset.projectId;
                
                new Sortable(taskList, {
                    animation: 150,
                    ghostClass: 'bg-blue-100',
                    onEnd: function(evt) {
                        const taskIds = Array.from(taskList.children)
                            .map(item => item.dataset.id);
                        
                        // Update task priorities on the server
                        fetch("{{ route('tasks.reorder') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                tasks: taskIds,
                                project_id: projectId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Refresh the page to show updated priorities
                                window.location.reload();
                            }
                        });
                    }
                });
            }
        });
    </script>
@endsection
@extends('layout')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Projects</h2>
        
        <form action="{{ route('projects.store') }}" method="POST" class="mb-8">
            @csrf
            <div class="flex space-x-2">
                <input 
                    type="text" 
                    name="name" 
                    placeholder="Project name" 
                    class="flex-1 border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Add Project
                </button>
            </div>
        </form>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-left">Name</th>
                        <th class="py-2 px-4 border-b text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $project->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <a 
                                    href="{{ route('tasks.index', ['project_id' => $project->id]) }}" 
                                    class="text-blue-600 hover:text-blue-800 mr-2"
                                >
                                    View Tasks
                                </a>
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="text-red-600 hover:text-red-800"
                                        onclick="return confirm('Are you sure you want to delete this project and all its tasks?')"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                    @if($projects->isEmpty())
                        <tr>
                            <td colspan="2" class="py-4 px-4 border-b text-center text-gray-500">
                                No projects found. Create one to get started.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
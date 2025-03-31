<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $selectedProject = $request->query('project_id') ? Project::findOrFail($request->query('project_id')) : ($projects->first() ?? null);
        
        if ($selectedProject) {
            $tasks = $selectedProject->tasks;
        } else {
            $tasks = collect();
        }
        
        return view('tasks.index', compact('tasks', 'projects', 'selectedProject'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Get the highest priority and add 1
        $highestPriority = Task::where('project_id', $validated['project_id'])->max('priority') ?? 0;
        $validated['priority'] = $highestPriority + 1;

        Task::create($validated);

        return redirect()->route('tasks.index', ['project_id' => $validated['project_id']])
            ->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
        ]);

        // If project has changed, put the task at the bottom of the new project
        if ($task->project_id != $validated['project_id']) {
            $highestPriority = Task::where('project_id', $validated['project_id'])->max('priority') ?? 0;
            $validated['priority'] = $highestPriority + 1;
        } else {
            $validated['priority'] = $task->priority;
        }

        $task->update($validated);

        return redirect()->route('tasks.index', ['project_id' => $validated['project_id']])
            ->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $projectId = $task->project_id;
        $task->delete();
        
        // Re-order remaining tasks
        $tasks = Task::where('project_id', $projectId)
            ->orderBy('priority')
            ->get();
            
        foreach ($tasks as $index => $task) {
            $task->update(['priority' => $index + 1]);
        }

        return redirect()->route('tasks.index', ['project_id' => $projectId])
            ->with('success', 'Task deleted successfully');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'tasks' => 'required|array',
            'tasks.*' => 'exists:tasks,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $taskIds = $request->tasks;
        
        foreach ($taskIds as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }
}

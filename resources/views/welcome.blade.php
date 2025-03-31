<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager - Organize Your Work</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-pattern {
            background-color: #f9fafb;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23bfdbfe' fill-opacity='0.4'%3E%3Cpath d='M0 38.59l2.83-2.83 1.41 1.41L1.41 40H0v-1.41zM0 1.4l2.83 2.83 1.41-1.41L1.41 0H0v1.41zM38.59 40l-2.83-2.83 1.41-1.41L40 38.59V40h-1.41zM40 1.41l-2.83 2.83-1.41-1.41L38.59 0H40v1.41zM20 18.6l2.83-2.83 1.41 1.41L21.41 20l2.83 2.83-1.41 1.41L20 21.41l-2.83 2.83-1.41-1.41L18.59 20l-2.83-2.83 1.41-1.41L20 18.59z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center">
                <i class="fas fa-tasks text-blue-600 text-2xl mr-2"></i>
                <h1 class="text-2xl font-bold text-blue-600">Task Manager</h1>
            </div>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Tasks</a></li>
                    <li><a href="{{ route('projects.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-200">Projects</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero-pattern py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Organize Your Tasks, Simplify Your Life</h2>
            <p class="text-lg md:text-xl text-gray-600 mb-10 max-w-3xl mx-auto">
                A powerful task management application that helps you stay organized, prioritize your work, and boost productivity.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('tasks.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition duration-200 transform hover:scale-105">
                    Get Started
                </a>
                <a href="#features" class="bg-white hover:bg-gray-100 text-blue-600 border border-blue-600 px-6 py-3 rounded-lg text-lg font-medium transition duration-200">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <section id="features" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12">Powerful Features</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-gray-50 p-6 rounded-lg shadow-md border border-gray-100 transition duration-300">
                    <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="fas fa-list-ul text-blue-600 text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Task Management</h4>
                    <p class="text-gray-600">Create, edit, and delete tasks with ease. Stay organized with a clear view of all your tasks.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-gray-50 p-6 rounded-lg shadow-md border border-gray-100 transition duration-300">
                    <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="fas fa-project-diagram text-blue-600 text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Project Organization</h4>
                    <p class="text-gray-600">Group tasks by projects to keep your work organized and categorized.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-gray-50 p-6 rounded-lg shadow-md border border-gray-100 transition duration-300">
                    <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                        <i class="fas fa-arrow-down-wide-short text-blue-600 text-xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-2">Drag & Drop Prioritization</h4>
                    <p class="text-gray-600">Reorder tasks with simple drag and drop. Priorities update automatically.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
                <h3 class="text-2xl font-bold mb-4">How It Works</h3>
                
                <ol class="space-y-6">
                    <li class="flex items-start">
                        <div class="flex-shrink-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4">
                            1
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-1">Create Projects</h4>
                            <p class="text-gray-600">Start by creating projects to categorize your tasks. This helps you organize your work effectively.</p>
                        </div>
                    </li>
                    
                    <li class="flex items-start">
                        <div class="flex-shrink-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4">
                            2
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-1">Add Tasks</h4>
                            <p class="text-gray-600">Create tasks within your projects. Each task is automatically assigned a priority.</p>
                        </div>
                    </li>
                    
                    <li class="flex items-start">
                        <div class="flex-shrink-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4">
                            3
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-1">Prioritize</h4>
                            <p class="text-gray-600">Drag and drop tasks to reorder them based on priority. The system automatically updates the priority numbers.</p>
                        </div>
                    </li>
                    
                    <li class="flex items-start">
                        <div class="flex-shrink-0 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center mr-4">
                            4
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold mb-1">Get Things Done</h4>
                            <p class="text-gray-600">Work through your tasks in priority order. Delete or edit tasks as needed.</p>
                        </div>
                    </li>
                </ol>
                
                <div class="mt-8 text-center">
                    <a href="{{ route('tasks.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg text-lg font-medium transition duration-200">
                        Start Managing Tasks
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <i class="fas fa-tasks text-blue-400 text-xl mr-2"></i>
                        <h2 class="text-xl font-bold">Task Manager</h2>
                    </div>
                    <p class="text-gray-400 mt-2">Organize your work, simplify your life</p>
                </div>
                
                <div class="flex space-x-4">
                    <a href="{{ route('tasks.index') }}" class="text-gray-300 hover:text-white transition duration-200">Tasks</a>
                    <a href="{{ route('projects.index') }}" class="text-gray-300 hover:text-white transition duration-200">Projects</a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Task Manager. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
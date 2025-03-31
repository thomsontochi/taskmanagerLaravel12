// ----------------------------------------
// README.md
// ----------------------------------------

# developia Laravel Task Manager

A simple task management application built with Laravel. This application allows users to:

- Create, edit, and delete tasks
- Organize tasks by projects
- Reorder tasks using drag and drop
- Automatically update task priorities

## Features

- Task Management:
  - Create tasks with names and auto-assigned priorities
  - Edit existing tasks
  - Delete tasks
  - Reorder tasks with drag and drop (priorities update automatically)

- Project Management:
  - Create projects
  - View tasks by project
  - Delete projects

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL
- Laravel 12.x

## Installation

1. Clone the repository or download the source code

2. Navigate to the project directory and install dependencies:
   ```
   composer install
   ```

3. Create a copy of the `.env.example` file and rename it to `.env`:
   ```
   cp .env.example .env
   ```

4. Generate an application key:
   ```
   php artisan key:generate
   ```

5. Configure your database connection in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. Run the migrations to create the necessary tables:
   ```
   php artisan migrate
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

8. Visit `http://localhost:8000` in your web browser to access the application

## Usage

1. Create a project first
2. Add tasks to the project
3. Drag and drop tasks to reorder them
4. Use the project dropdown to switch between projects

## Implementation Details

- Models:
  - `Project` - Represents a project with tasks
  - `Task` - Represents a task with name, priority, and project association

- Controllers:
  - `ProjectController` - Handles project creation and management
  - `TaskController` - Handles task creation, editing, deletion, and reordering

- Drag and Drop:
  - Implemented using Sortable.js
  - AJAX calls update task priorities in the database

- Styling:
  - Uses Tailwind CSS for a clean, responsive interface

## License

This project is open-source and available under the MIT License.


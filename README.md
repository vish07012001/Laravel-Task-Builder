### Description 
Description
This is a simple task management system built with Laravel. The system allows users to manage tasks, with functionality such as adding, editing, displaying, and deleting tasks. The application uses Laravel's Blade templating engine and provides a clean, responsive interface for users to interact with.

### Features
<ul>
<li>Task Management: Create, update, and delete tasks.</li>
<li>Task Display: View a list of all tasks with options to view or edit each task.</li>
<li>Responsive UI: Built using Tailwind CSS for a clean, mobile-friendly interface.</li>
</ul>

# Installation
## Prerequisites
### Before you start, ensure you have the following installed:

<ol>
<li>PHP >= 8.2 </li>
<li>Composer</li>
<li>Laravel</li>
<li>MySQL or SQLite database</li>
</ol>

### Steps
<ol>
    <li>Clone the repository</li>
    <li>Install dependencies:<br/> 
        <ol> <li>cd task-management-system </li>
        <li>composer install</li>
        </ol>
    </li>
    <li>Set up your .env file: Copy .env.example to .env:<br/></li>
    <li>Generate the application key:<br/> php artisan key:generate</li>
    <li>Set up the database:
        <ol>
        <li>Configure your .env file with the correct database settings.</li>
        <li>Run migrations to create the necessary database tables: <br/> php artisan migrate</li>
        </ol>
    </li>
    <li>Seed the database (optional):
    <ol>
        <li>
            You can populate the database with sample data using: <strong> php artisan db:seed </strong>
        </li>
    </ol>
    </li>
    <li>Serve the application : <strong> php artisan serve </strong> </li>
    
</ol>

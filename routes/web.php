<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use \App\Models\Task;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'task' => Task::latest()->paginate(5)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');

Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.edit');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task Updated Successfully!');
})->name('tasks.update');


Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task Created Successfully!');
})->name('tasks.store');


Route::delete('/tasks/{id}', function ($id) {

    $task = Task::findOrFail($id);

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{id}/toggle-complete', function ($id) {

    $task = Task::findOrFail($id);
    $task->completed = !$task->completed;
    $task->save();

    return redirect()->back()->with('success', 'Task Updated Successfully!');
})->name('tasks.toggle-complete');

// Route::get('/hello',function(){
//     return "Hello";
// });

// Route::get('/hello',function(){
//     return "Hello";
// })->name('hello');

// Route::get('/hallo',function(){
//     return redirect('/hello');
// });

// Route::get('/hallo',function(){
//     return redirect()->route('hello');
// });


// Route::get('/greet/{name}',function($name){
//     return "Hello " . $name . "!";
// });

Route::fallback(function () {
    return "Still got somewhere!";
});

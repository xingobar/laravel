<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
	// the tasks repository instance
	// @var TaskRepository
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
    	$this->middleware('auth');
    	$this->tasks = $tasks;
    }
    public function index(Request $request)
    {
    	return view('tasks.index',[
    		'tasks' => $this->tasks->forUser($request->user()),
    	]);
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name' => 'required|max:255',
    	]);
    	$request->user()->tasks()->create([
    		'name' => $request->name,
    	]);
    	return redirect('/tasks');
    }
    public function destroy(Request $request,Task $task)
    {
    	// call destroy of TaskPolicy class
    	$this->authorize('destroy',$task);
    	$task->delete();
    	return redirect('/tasks');
    }
}

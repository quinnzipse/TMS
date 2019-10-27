<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddTask;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $tasks = Task::where('uid', '=', Auth::user()->id)->orderBy('priority', 'asc')->orderBy('est_Minutes', 'asc')->get();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    function add(){
        $cat = Category::get();
        return view('tasks/add', ['categories' => $cat]);
    }

    function addProcess(AddTask $request){
        $task = new Task();
        $task->uid = Auth::user()->id;
        $task->desc = $request->get('desc');
        $task->title = $request->get('name');
        $task->priority = $request->get('priority');
        if($request->get('category')) {
            $task->category = $request->get('category');
        } else {
            $task->category = 'default';
        }
        $task->est_Minutes = $request->get('timeMin');

        $task->save();

        return redirect(route('tasks'));
    }

    function delete($task){
        //TODO: add some logic here
    }

    function edit($task){
        // TODO: Add some security here to prevent random people from accessing tasks
        $cats = Category::get();
        $task = Task::where('id', '=', $task)->first();
        return view('tasks/modify', ['task' => $task, 'cats' => $cats]);
    }

    function editProcess(EditTask $request){
        $task = Task::where('id', '=', $request->get('taskID'))->first();
        $task->desc = $request->get('desc');
        $task->title = $request->get('name');
        $task->priority = $request->get('priority');
        if($request->get('category')) {
            $task->category = $request->get('category');
        } else {
            $task->category = 'default';
        }
        $task->minutes += $request->get('minElapsed');

        $task->save();

        return redirect(route('tasks'));
    }

    function view($task){
        return view('tasks/view');
    }
}

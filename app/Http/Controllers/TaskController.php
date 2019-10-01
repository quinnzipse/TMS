<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddTask;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(){
        return view('tasks/index');
    }

    function add(){
        $cat = Category::get();
        return view('tasks/add', ['categories' => $cat]);
    }

    function addProcess(AddTask $request){
        $task = new Task();
        $task->desc = $request->get('desc');
        $task->name = $request->get('name');
        $task->priority = $request->get('priority');
        //TODO: add some business logic here
        return view('tasks.index');
    }

    function delete($task){
        //TODO: add some logic here
    }

    function edit($task){
        return view('tasks/edit');
    }

    function editProcess($task){
        //TODO: add some logic here
    }

    function view($task){
        return view('tasks/view');
    }
}

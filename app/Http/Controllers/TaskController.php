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
        var_dump($request->get('desc'));
//        if($request->has('error')) return redirect()->route('tasks.add');
        var_dump($request->get('desc'));
//        $task = new Task();
//
//        $task->desc = $request->get('desc');

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

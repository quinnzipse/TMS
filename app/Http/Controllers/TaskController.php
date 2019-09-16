<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    function index(){
        return view('tasks/index');
    }

    function add(){
        return view('tasks/add');
    }

    function addProcess(){
        //TODO: add some logic here
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

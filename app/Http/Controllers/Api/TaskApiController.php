<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Resources\Task as TaskResource;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        // Get tasks
        $tasks = Task::paginate(15)->withTrashed();

        // Return the collection of Tasks as a resource
        return TaskResource::collection($tasks);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return TaskResource
     */
    public function store(Request $request)
    {
        $task = $request->isMethod('put') ?
            Task::findOrFail($request->task_id) : new Task;

        $task->category = $request->input('category');
        $task->priority = $request->input('priority');
        $task->title = $request->input('title');
        $task->desc = $request->input('desc');
        $task->minutes = $request->input('minutes');
        $task->start_date = $request->input('start_date');
        $task->end_Date = $request->input('end_Date');
        $task->in_use = $request->input('in_use');
        $task->status = $request->input('status');
        $task->flag = $request->input('flag');
        $task->shared = $request->input('shared');

        if($task->save()){
            return new TaskResource($task);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return TaskResource
     */
    public function show($id)
    {
        // Get a specific task
        $task = Task::findOrFail($id);

        // return the sing task as a resource
        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return TaskResource
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        if($task->delete()){
            return new TaskResource($task);
        }
    }
}

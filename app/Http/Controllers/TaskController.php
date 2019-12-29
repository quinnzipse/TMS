<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddTask;
use App\Http\Requests\EditTask;
use App\Task;
use App\TimeCard;
use Carbon\Carbon;
use Carbon\Traits\Boundaries;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $tasks = Task::where('uid', '=', Auth::user()->id)->orderBy('end_date', 'asc')->orderBy('priority', 'asc')->orderBy('est_Minutes', 'asc')->get();

        return view('tasks/index', ['tasks' => $tasks]);
    }

    function add(){
        $cat = Category::get();
        return view('tasks/add', ['categories' => $cat]);
    }

    function startClock(Task $task){
        if($task->uid != Auth::id()) // in the future, I may want to share this with others.
            abort(403, "uid incorrect for this task. You do not have permission to edit this.");

        $time_card = new TimeCard();
        $time_card->tid = $task->id;
        $time_card->save();

        $task->in_use = true;
        $task->save();
    }

    function endClock(Task $task){
        if($task->uid != Auth::id()) // in the future, I may want to share this with others.
            abort(403, "uid incorrect for this task. You do not have permission to edit this.");

        $time_card = TimeCard::where('tid', '=', $task->id)->orderBy('created_at', 'desc')->first();
        $time_card->diff = $this->calcTime($time_card);
        $time_card->save();

        $task->est_minutes = $task->est_minutes - $time_card->diff;
        echo "\n" . $task->est_minutes;
        $task->in_use = false;
        $task->save();
    }

    function calcTime(TimeCard $timeCard){
        $in = Carbon::parse($timeCard->created_at);

        // Simple debug - check network tab.
        echo round($in->diffInMinutes(Carbon::now()));

        return round($in->diffInRealMinutes(Carbon::now()));
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
        $task->end_date = $request->get('dueDate');

        $task->save();

        return redirect(route('tasks'));
    }

    function delete(Task $task){
        $task->delete();

        return redirect(route('tasks'));
    }

    function edit(Task $task){
        // TODO: Add some security here to prevent random people from accessing tasks
        $cats = Category::get();
        $task = Task::where('id', '=', $task->id)->first();
        return view('tasks/modify', ['task' => $task, 'cats' => $cats]);
    }

    function editProcess(EditTask $request, Task $task){
        $task->desc = $request->get('desc');
        $task->end_date = $request->get('dueDate');
        $task->title = $request->get('name');
        $task->priority = $request->get('priority');
        if($request->get('category')) {
            $task->category = $request->get('category');
        } else {
            $task->category = 'default';
        }
        $task->est_minutes = $request->get('timeMin');
        $task->minutes += $request->get('minElapsed');

        $task->save();

        return redirect(route('tasks'));
    }

    function checkTime(Task $task){
        return $task->est_minutes;
    }

    function view($task){
        return view('tasks/view');
    }
}

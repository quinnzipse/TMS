@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{route('tasks.add')}}" class="btn btn-outline-success float-right"><i class="fas fa-plus"></i> Add Task</a>
        <h3 class="mb-3"><i class="fas fa-tasks"></i> Tasks </h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th width="30%">Title</th>
                <th width="25%">Category</th>
                <th width="15%">Priority</th>
                <th width="20%">Time left</th>
                <th width="10%">Flag</th>
                <th></th>
                <th ></th>
                <th ></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
                <tr>
                    <td class="text-truncate">{{$t->title}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->priority}}</td>
                    <td>{{$t->est_minutes}} mins</td>
                    <td>{{$t->flag}}</td>
                    <td class="ml-0 mr-0 pr-1 pl-1"><button type="button" onclick="logTime({{$t->id}})" class="btn btn-outline-secondary btn-sm"><i class="far fa-clock"></i></button></td>
                    <td class="mr-0 pr-1 pl-1"><button type="button" onclick="editTask({{$t->id}})" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></button></td>
                    <td class="ml-0 mr-0 pr-1 pl-1"><button type="button" onclick="deleteTask({{$t->id}})" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script>
        function deleteTask(id){
            window.location = '/tasks/' + id + '/delete';
        }
        function editTask(id){
            window.location = '/tasks/' + id + '/edit';
        }
    </script>
@endsection

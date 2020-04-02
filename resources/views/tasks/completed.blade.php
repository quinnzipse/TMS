@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-0 float-left mt-2"><i class="fas fa-tasks"></i> Tasks </h3>
                <button href="{{route('tasks.add')}}" class="btn btn-outline-success float-right"><i
                        class="fas fa-plus"></i> Add
                    Task
                </button>
            </div>
        </div>
        <hr class="mt-2 mb-2">
        <nav class="nav nav-pills nav-fill mt-2 mb-2">
            <a class="nav-link" href="{{route('tasks')}}">Active</a>
            <a class="nav-link" href="{{route('tasks.overdue')}}">Overdue</a>
            <a class="nav-link active" href="#">Completed</a>
        </nav>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="width: 25%">Title</th>
                <th style="width: 22%">Category</th>
                <th style="width: 14%">Priority</th>
                <th style="width: 14%">Time left</th>
                <th style="width: 10%">Flag</th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
                <tr>
                    <td class="text-truncate" id="title{{$t->id}}">{{$t->title}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->priority}}</td>
                    <td id="min{{$t->id}}">{{$t->est_minutes}} mins</td>
                    <td>{{$t-v>flag}}</td>
                    <td class="mr-0 pr-1 pl-1">
                        <button type="button" onclick=""
                                class="btn btn-outline-secondary btn-sm"><i class="far fa-eye"></i></button>
                    </td>
                    <td class="mr-0 pr-1 pl-1">
                        <button type="button" onclick=""
                                class="btn btn-outline-primary btn-sm"><i class="fas fa-box-open"></i></button>
                    </td>
                    <td class="ml-0 mr-0 pr-1 pl-1">
                        <button type="button" onclick=""
                                class="btn btn-outline-danger btn-sm"><i class="fas fa-eraser"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <script>
    </script>
@endsection

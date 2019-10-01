@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{route('tasks.add')}}" class="btn btn-outline-success float-right">Add</a>
        <h3>Tasks</h3>
        <hr>
        <br>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Time left</th>
                <th>Flag</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
                <tr onclick="editTask({{$t->id}})">
                    <td>{{$t->title}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->priority}}</td>
                    <td>{{$t->est_Minutes}}</td>
                    <td>{{$t->flag}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <script>
        function editTask(id){
            window.location = '/tasks/' + id + '/edit';
        }
    </script>
@endsection

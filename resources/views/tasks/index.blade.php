@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{route('tasks.add')}}" class="btn btn-outline-primary float-right">Add</a>
        <h3>Tasks</h3>
        <hr>
    </div>
@endsection

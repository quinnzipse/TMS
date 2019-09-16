@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <h3>Tasks</h3>
        <a href="{{route()}}">Add</a>
        <hr>
    </div>
@endsection

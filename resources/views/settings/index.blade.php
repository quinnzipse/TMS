@extends('layouts.app')

@section('title')
    <title>TMS - Settings</title>
@endsection

@section('content')
    <div class="container-fluid">
        <ul class="nav nav-pills float-right">
            <li class="nav-item">
                <a class="nav-link active" id="pill-general" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pill-categories" data-toggle="pill" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pill-flags" data-toggle="pill" href="#flags" role="tab" aria-contrrols="flags" aria-selected="false">Flags</a>
            </li>
        </ul>
        <h3>Settings</h3>
        <hr>
        <div class="tab-content" id="pill-content">
            <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="pill-general">
                <!--TODO: put the general settings here-->
                <h5>Click a tab above to continue</h5>
            </div>
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="pill-categories">
                @include('settings.flagHome')
            </div>
            <div class="tab-pane fade" id="flags" role="tabpanel" aria-labelledby="pill-flags">
                @include('settings.categoryHome')
            </div>
        </div>
    </div>
    <style>
    </style>
@endsection

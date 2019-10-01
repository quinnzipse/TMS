@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Edit Task</h3>
        <hr class="mb-0">
        <small class="float-right mt-0 mb-4">id = {{$task->id}}</small>
        <form class="mt-3">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group-sm">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control input-group-sm" name="name" value="{{$task->title}}">
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="category">Category</label>
                    <div class="input-group-sm">
                        <select class="form-control" id="category"
                                name="category" {{sizeof($cats) > 0 ? 'required' : 'disabled'}}>
                            @if(sizeof($cats) == 0)
                                <option selected>No Categories Available</option>
                            @else
                                <option value="" selected disabled>Select One</option>
                                @foreach($cats as $cat)
                                    <option value="{{$cat->title}}" {{$cat->title == $task->category ? 'selected' : ''}}></option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group-sm">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" name="priority" id="priority" value="{{$task->priority}}">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group-sm">
                        <label for="timeMin">Estimated Time in Minutes</label>
                        <input type="number" class="form-control" id="timeMin" name="timeMin">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="input-group-sm">
                        <label for="dueDate">Due Date</label>
                        <input type="date" class="form-control" id="dueDate" name="dueDate">
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-sm btn-outline-success">Edit</button>
            <button class="btn btn-sm btn-outline-secondary">Cancel</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3>Edit Task</h3>
        <hr class="mb-0">
        <small class="float-right mt-0 mb-4">id = {{$task->id}}</small>
        <form class="mt-3" action="{{route('tasks.edit', $task->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group-sm">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="{{ $errors->has('name') ? 'is-invalid': '' }} form-control input-group-sm" name="name" value="{{$task->title}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
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
                        <input type="number" class="{{ $errors->has('priority') ? 'is-invalid': '' }} form-control" name="priority" id="priority" value="{{$task->priority}}" min="1" max="10">
                        @if($errors->has('priority'))
                            <div class="invalid-feedback">{{ $errors->first('priority') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group-sm">
                        <label for="timeMin">Estimated Time in Minutes</label>
                        <input type="number" class="form-control {{ $errors->has('timeMin') ? 'is-invalid' : '' }}" id="timeMin" name="timeMin" min="1" value="{{$task->est_minutes}}">
                        @if($errors->has('timeMin'))
                            <div class="invalid-feedback">{{ $errors->first('timeMin') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group-sm">
                        <label for="dueDate">Due Date</label>
                        <input type="date" class="form-control" id="dueDate" name="dueDate" value="{{$task->end_date}}">
                    </div>
                </div>
                <div class="col-lg-5">
                    <label for="desc">Description</label>
                    <div class="input-group-sm">
                        <textarea type="text" class="form-control" placeholder="Enter a description here" id="desc" name="desc">{{$task->desc}}</textarea>
                        @if($errors->has('desc'))
                            <div class="invalid-feedback">{{ $errors->first('desc') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-sm btn-outline-success">Edit</button>
            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="goBack()">Cancel</button>
        </form>
    </div>
    <script type="text/javascript">
        function goBack(){
            window.location = '/tasks';
        }
    </script>
@endsection

@extends('layouts.app')

@section('title')
    <title>TMS - Add</title>
@endsection

@section('content')
    <div class="container justify-content-center">
        <h1 class="mt-5 text-center">Would You Like to Add a Goal or Task?</h1>
        <hr>
        <div class="d-flex mt-5">
            <div class="card border-secondary d-inline-flex bg-success mr-5" style="margin-left: auto; width: 35%;color: #f1f9ff">
                <div class="card-body">
                    <div class="card-title text-white">
                        <h3><i class="fas fa-bullseye"></i> Goal</h3>
                    </div>
                    <hr class="bg-light">
                    <span>This is something that we will break down into smaller steps to achieve over time.</span>
                    <h6 class="mt-3" style="color: #f1f9ff">Features:</h6>
                    <ul>
                        <li>Break down a big goal!</li>
                        <li>Complete small tasks each day!</li>
                        <li>Track your progress over days, weeks, or months!</li>
                    </ul>
                    <button class="btn btn-outline-light float-right mt-auto">Create Goal</button>
                </div>
            </div>
            <div class="card border-secondary bg-primary d-inline-flex mr-auto ml-5" style="width: 35%; color: #daefff">
                <div class="card-body">
                    <div class="card-title text-white">
                        <h3><i class="fas fa-thumbtack"></i> Task</h3>
                    </div>
                    <hr class="bg-light">
                    <span>Nothing special just what you do every day.</span>
                    <h6 class="mt-3" style="color: #f1f9ff">Features:</h6>
                    <ul>
                        <li>Track your time!</li>
                        <li>Keep track of what you complete!</li>
                        <li>Set due dates!</li>
                    </ul>
                    <button class="btn btn-outline-light float-right d-flex align-items-end">Create Task</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid collapse form" id="task_form">
        <h3>Add a Task</h3>
        <hr>
        <form action="{{route('tasks.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <label for="name">Name</label>
                    <div class="input-group-sm">
                        <input type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }} form-control" id="name"
                               name="name" value="{{old('name')}}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="category">Category</label>
                    <div class="input-group-sm">
                        <select class="form-control" id="category"
                                name="category" {{sizeof($categories) > 0 ? 'required' : 'disabled'}}>
                            @if(sizeof($categories) == 0)
                                <option selected>No Categories Available</option>
                            @else
                                <option value="" selected disabled>Select One</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->title}}"></option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="priority">Priority</label>
                    <div class="input-group-sm">
                        <input type="number" class="{{$errors->has('priority') ? 'is-invalid' : '' }} form-control"
                               min="1" max="10" value="{{old('priority') != '' ? old('priority') : 5}}" placeholder="5"
                               id="priority" name="priority">
                        @if($errors->has('priority'))
                            <div class="invalid-feedback">{{ $errors->first('priority') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="timeMin">Estimated Time in Minutes</label>
                    <div class="input-group-sm">
                        <input type="number" class="{{$errors->has('timeMin') ? 'is-invalid' : ''}} form-control"
                               min="0" value="{{old('timeMin') != '' ? old('timeMin') : 45 }}" placeholder="45"
                               id="timeMin" name="timeMin">
                        @if($errors->has('timeMin'))
                            <div class="invalid-feedback">{{ $errors->first('timeMin') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="desc">Description</label>
                    <div class="input-group-sm">
                        <textarea type="text" class="{{ $errors->has('desc') ? 'is-invalid' : '' }} form-control"
                                  placeholder="Enter a description here" id="desc" name="desc">
                        </textarea>
                        @if($errors->has('desc'))
                            <div class="invalid-feedback">{{ $errors->first('desc') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="dueDate">Due Date</label>
                    <div class="input-group-sm">
                        <input type="date" class="{{ $errors->has('dueDate') ? 'is-invalid' : '' }}form-control"
                               id="dueDate" name="dueDate" value="{{old('dueDate') != '' ? old('dueDate') : $date }}">
                        @if($errors->has('dueDate'))
                            <div class="invalid-feedback">{{ $errors->first('dueDate') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-outline-success pr-4 pl-4 mr-2 float-right">Add</button>
                <button type="button" onclick="goBack()" class="btn btn-outline-secondary mr-2 float-right">Cancel
                </button>
            </div>
        </form>
    </div>

    <script type="text/javascript">

        function goBack() {
            window.location = '/tasks';
        }

        document.addEventListener("DOMContentLoaded", function () {
            $('#desc').innerText = "{{old('desc')}}";
        });

        //TODO: this needs some help if I would like to implement it
        function youSure() {
            swal({
                title: "Are you sure?",
                text: "You've worked so hard on this, are you sure you want to abandon it?",
                icon: "warning",
                buttons: {
                    cancel: true,
                    confirm: {
                        text: "Yeet",
                        visible: true,
                    }
                }
            }).then((result) => {
                if (result.value) {
                    window.location = '/tasks';
                }
            });
        }
    </script>
@endsection


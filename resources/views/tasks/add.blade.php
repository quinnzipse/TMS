@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <h3>Add a Task</h3>
        <hr>
        <form action="{{route('tasks.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <label for="name">Name</label>
                    <div class="input-group-sm">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="category">Category</label>
                    <div class="input-group-sm">
                        <select class="form-control" id="category" name="category" {{sizeof($categories) > 0 ? 'required' : 'disabled'}}>
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
                        <!-- TODO: Design decision, should I make this a select with premade options or should I keep it as a number -->
                        <input type="number" class="form-control" min="1" max="10" value="5" placeholder="5" id="priority" name="priority">
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
                        <input type="number" class="form-control" min="0" value="15" placeholder="15" id="timeMin" name="timeMin">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="desc">Description</label>
                    <div class="input-group-sm">
                        <textarea type="text" class="form-control" placeholder="Enter a description here" id="desc" name="desc">
                        </textarea>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="dueDate">Due Date</label>
                    <div class="input-group-sm">
                        <input type="date" class="form-control" id="dueDate" name="dueDate">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary pr-4 pl-4 mr-2">Add</button>
                <button type="button" onclick="goBack()" class="btn btn-outline-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function goBack(){
            window.location = '/tasks';
        }

        //TODO: this needs some help if I would like to implement it
        function youSure(){
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
                if(result.value){
                    window.location = '/tasks';
                }
            });
        }
    </script>
@endsection


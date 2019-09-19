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
                        <input type="text" class="form-control" id="name" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="category">Category</label>
                    <div class="input-group-sm">
                        <select class="form-control" {{sizeof($categories) > 0 ? 'required' : 'disabled'}}>
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
                        <input type="number" class="form-control" min="1" max="10" value="5" placeholder="5" id="priority">
                   </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="timeMin">Estimated Time in Minutes</label>
                    <div class="input-group-sm">
                        <input type="number" class="form-control" min="0" value="15" placeholder="15" id="timeMin">
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="desc">Description</label>
                    <div class="input-group-sm">
                        <textarea type="text" class="form-control" placeholder="Enter a description here" id="desc">
                        </textarea>
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="dueDate">Due Date</label>
                    <div class="input-group-sm">
                        <input type="date" class="form-control" id="dueDate">
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-success pr-4 pl-4 mr-2">Add</button>
                <button type="button" onclick="goBack()" class="btn btn-warning">Cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function goBack(){
            history.back();
            //This is a bad idea FIXME
        }

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
            });
        }
    </script>
@endsection


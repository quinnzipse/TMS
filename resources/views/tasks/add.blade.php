@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <h3>Add a Task</h3>
        <hr>
        <form>
            <div class="row">
                <div class="col-lg-4">
                    <label for="name">Name</label>
                    <div class="input-group-sm">
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="col-lg-4">
                    <label for="category">Category</label>
                    <div class="input-group-sm">
                        <select class="form-control">
                            <option value=""></option>
                            @foreach(category)

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

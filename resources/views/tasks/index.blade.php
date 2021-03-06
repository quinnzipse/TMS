@extends('layouts.app')

@section('title')
    <title>TMS - Tasks</title>
@endsection

@section('content')
    <div class="container-fluid">
        <a href="{{route('tasks.add')}}" class="btn btn-outline-success float-right"><i class="fas fa-plus"></i> Add
            Task</a>
        <h3 class="mb-3"><i class="fas fa-tasks"></i> Tasks </h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th style="width: 25%">Title</th>
                <th style="width: 22%">Category</th>
                <th style="width: 14%">Priority</th>
                <th style="width: 14%">Time left</th>
                <th style="width: 10%">Flag</th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
                <th style="width: 5%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $t)
                <tr>
                    <td class="text-truncate" id="title{{$t->id}}">{{$t->title}}</td>
                    <td>{{$t->category}}</td>
                    <td>{{$t->priority}}</td>
                    <td id="min{{$t->id}}">{{$t->est_minutes}} mins</td>
                    <td>{{$t->flag}}</td>
                    <td class="ml-0 mr-0 pr-1 pl-1">
                        <button type="button" onclick="time({{$t->id}})" id="stopWatchButton{{$t->id}}"
                                class="btn {{ $t->in_use ? 'btn-outline-success' : 'btn-outline-secondary' }}  btn-block
                                btn-sm"><i
                                class="fas fa-stopwatch"></i></button>
                    </td>
                    <td class="mr-0 pr-1 pl-1">
                        <button type="button" onclick="editTask({{$t->id}})" class="btn btn-outline-primary btn-sm oBut{{$t->id}}"><i
                                class="far fa-edit"></i></button>
                    </td>
                    <td class="ml-0 mr-0 pr-1 pl-1">
                        <button type="button" onclick="markAsDone({{$t->id}})" class="btn btn-outline-success btn-sm oBut{{$t->id}}"><i
                                class="fas fa-check"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <script>
        let buttonStartColor = 'btn-outline-secondary',
            buttonEndColor = 'btn-outline-success',
            rowActiveColor = '';

        function markAsDone(id){
            let taskName = $("#title" + id).text();
            $.ajax({
                async: true,
                type: 'get',
                url: '/tasks/' + id + '/done'
            }).then(function(result) {
                console.log(result);
                if(result === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: taskName + ' was marked as completed.',
                        timer: 1560,
                        timerProgressBar: true,
                        footer: 'The window will automatically refresh.'
                    }).then(function(){
                        location.reload();
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'An error has occurred.'
                    });
                }
            });
        }

        function editTask(id) {
            window.location = '/tasks/' + id + '/edit';
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        function time(id) {
            $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            let button = $('#stopWatchButton' + id),
                row = button.parent().parent(), task = 'end',
                oBut = $('.oBut' + id);

            if (button.hasClass(buttonStartColor)) {
                console.log("Starting the timer");
                button.blur();
                button.removeClass(buttonStartColor);
                button.addClass(buttonEndColor);
                row.addClass(rowActiveColor);
                button.parent().prop('colspan', 3);
                oBut.each(function () {
                    $(this).parent().prop('hidden', true);
                });
                task = 'start';
            } else {
                console.log("Ending the timer");
                button.removeClass(buttonEndColor).addClass(buttonStartColor).blur();
                row.removeClass(rowActiveColor);
                button.parent().prop('colspan', 1);
                oBut.each(function () {
                    $(this).parent().prop('hidden', false);
                });
            }

            $.ajax({
                async: true,
                type: 'get',
                url: '/tasks/' + id + '/' + task
            }).done(function (result) {
                // This ajax call updates the time.
                // It only gets called if you are ending a timer.
                if (task === 'end') {
                    $.ajax({
                        async: true,
                        type: 'get',
                        url: '/tasks/' + id + '/estTime',
                        success: function (result) {
                            $("#min" + id).text(result + " mins");
                            if (result <= 0) {
                                let taskName = $("#title" + id).text();
                                Swal.fire({
                                    title: 'Is "' + taskName + '" complete?',
                                    icon: 'question',
                                    allowOutsideClick: false,
                                    showCancelButton: true,
                                    confirmButtonText: 'Mark as Done',
                                    cancelButtonText: 'Add Time',
                                }).then((result) => {
                                    if (result.value) {
                                        markAsDone(id);
                                    } else {
                                        Swal.fire({
                                            title: 'How much time should I add?',
                                            text: '(in minutes)',
                                            input: 'text', //TODO: Think about changing this to a select with common times to add.
                                            icon: 'question',
                                            footer: '<small class="text-muted">This will be the new time left.</small>',
                                            confirmButtonText: 'Add Time',
                                            confirmButtonColor: '#38c172',
                                            inputValue: 0,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                            inputValidator: (value) => {
                                                if (value <= 0) {
                                                    return 'The value must be greater than 0';
                                                }
                                                if(isNaN(value)){
                                                    return 'The value must be numeric';
                                                }
                                            },
                                            preConfirm: (time) => {
                                                return $.ajax({
                                                    async: true,
                                                    type: 'post',
                                                    url: '/tasks/' + id + '/addTime/' + time
                                                }).then((result) => {
                                                    if(!isNaN(result)) {
                                                        $("#min" + id).text(result + " mins");
                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: time + ' mins added to ' + taskName.toLowerCase() + '!'
                                                        });
                                                    }
                                                    else {
                                                        Toast.fire({
                                                            icon: 'error',
                                                            title: 'An error has occurred.'
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    });
                }
            });

        }

    </script>
@endsection

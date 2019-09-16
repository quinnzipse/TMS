<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Quinn Zipse">
    <meta name="keywords" content="Time Management System, TMS, T, M, S, Time, Managment, System, Quinn Zipse, Quinn, Zipse, .dev, dev, quinnzipse.dev, quinnzipse">
    <meta name="description" content="A simple solution to tracking your time. Built as a tool for anyone to use. Create by Quinn.">

    <title>Time Management System</title>

    <meta name="csrf-token" content="{{csrf_token()}}">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class='min-vh-100'>
@include('layouts/nav')
<div class="container mt-5">
    <h1 class="font-weight-light align-middle">Time Management System (TMS)</h1>
    <hr>
    <p>This is a simple program that tracks your time. You just click on a task you would like to log time in it. Then, when you are done, just close out!</p>
</div>

</body>
</html>

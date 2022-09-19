<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>UserHomePage</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.6.1.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">--}}


</head>
@php
    $username = session('username');
@endphp
<body>
<div class="container">
    <br>
    <x-header :username="$username"/>
</div>
</div>
<hr>
<div class="container">
    <div class="row">
        <x-sidebar/>
        {{$slot}}
    </div>

</div>

</body>

</html>


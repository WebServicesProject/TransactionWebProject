<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h4>Login</h4>
            <hr>
            <form action="{{route('login-user')}}" method="POST">
{{--                @if(Session::has('success'))--}}
{{--                    <div class="alert alert-success">{{Session::get('success')}}</div>--}}
{{--                @endif--}}
{{--                @if(Session::has('fail'))--}}
{{--                    <div class="alert alert-danger">{{Session::get('fail')}}</div>--}}
{{--                @endif--}}
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username" id="username"
                           value="">
                    <span class="text-danger">@error('username') {{$message}} @enderror</span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password"
                           value="">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous">

</script>

</html>

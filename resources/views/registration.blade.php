<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />


</head>
<body>
<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->

    <div class="card col-md-6 offset-md-3 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
        <div class="card-body py-5 px-md-5">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-5">Sign up now</h2>
                    <form action="{{route('register-user')}}" method="POST">
                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="mb-3 form-outline">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control text-center"  name="username" id="username"
                                   value="">
                            <span class="text-danger">@error('username') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3 form-outline">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control text-center"  name="password" id="password"
                                   value="">
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3 form-outline">
                            <label for="password_confirmation" class="form-label">Confirm password</label>
                            <input type="password" class="form-control text-center" name="password_confirmation"
                                   id="password_confirmation" value="">
                        </div>
                        <div class="mb-3 form-outline">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control text-center"  name="email" id="email" value="">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>

                        <p class="small fw-bold mt-2 pt-1 mb-0">Already a user? <a href="login"
                                                                                          class="link-danger">log in</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section: Design Block -->
</body>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</html>

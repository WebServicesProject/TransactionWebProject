<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery-3.6.1.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="container">
    <table class="table caption-top">
        <caption>List of book</caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ISBN</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">In stock</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->ISBN}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->category}}</td>
                    <td>{{$book->quantity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span class="text-center">{{$data->links()}}</span>
</div>
</body>
</html>

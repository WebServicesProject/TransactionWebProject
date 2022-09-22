<div clas="row">
    <div class="col-md-12">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <table class="table table-bordered">

            <thead id="listhead">
            <tr>
                <th id="id">ID</th>
                <th id="th1">ISBN</th>
                <th id="th2">Title</th>
                <th id="th3">Category</th>
                <th id="th4">Stock</th>
                <th id="th5">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->category}}</td>
                        <td>{{$book->quantity}}</td>
                        <td>
                            @php
                            $url = "loan/".$book->id;
                            @endphp
                            <a href={{$url}} id="loan"
                                    class="w-50 btn btn-sm  btn-warning">&nbsp&nbspLoan&nbsp&nbsp
                            </a>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
            <span class="text-center">
                {{$books->links()}}
            </span>


    </div>
</div>

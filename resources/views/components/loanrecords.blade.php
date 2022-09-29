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
                <th id="th3">Loan Date</th>
                <th id="th4">Due Date</th>
                <th id="th5">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($loanRecords as $record)
                @php
                    $dueDate = date('Y-m-d',strtotime($record->loanDate.'+21 days'))
                @endphp
                @if($dueDate < date('Y-m-d',time()))
                    <tr class="alert alert-danger">
                        @else
                            <tr>
                @endif

                    <th scope="row">{{$record->bid}}</th>
                    <td>{{$record->ISBN}}</td>
                    <td>{{$record->title}}</td>
                    <td>{{$record->loanDate}}</td>
                    <td>{{$dueDate}}</td>
                    <td>
                        @php
                            $url = "renew/".$record->id;
                        @endphp
                        <a href="{{$url}}" id="renew"
                           class="w-50 btn btn-sm  btn-warning">&nbsp&nbspRenew&nbsp&nbsp
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span class="text-center">
                {{$loanRecords->links()}}
            </span>


    </div>
</div>

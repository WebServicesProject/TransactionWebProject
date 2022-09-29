<div>
    <div class="row">
        <div class="col-md-2">
            <image src="{{asset('images/vanier.jpg')}}" width="200px"/>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-5">
            <br>
            <div class="row">
                <form action="{{route('search')}}" method="POST">
                    @csrf
                    <div class="col-md-9">
                        <input type="hidden" name="searchBy" value="5"/>
                        <input type="text" class="form-control" id="searchText" name="searchText" placeholder="Search">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-1">
            <image src="{{asset('images/bell.jpg')}}" width="50px" class="img-responsive"></image>
        </div>
        <div class="col-md-1">
            <image src="{{asset('images/message.jpg')}}" width="50px" class="img-responsive"></image>
        </div>
        <div class="col-md-1">
            <image src="{{asset('images/person.jpg')}}" width="50px" class="img-responsive"></image>
        </div>
        <div class="col-md-1">
            <h5>{{$username}}</h5>
        </div>
        <div class="col-md-1">
            <a href="{{route('logout')}}">logout</a>
        </div>
    </div>
</div>

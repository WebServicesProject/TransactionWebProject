<form action="{{route('search')}}" method="POST">
    @csrf
    <div class="col-md-3">
        <select name="searchBy" class="form-select form-select-lg" aria-label=".form-select-lg example">
            <option selected>Search By</option>
            <option value="1">ISBN</option>
            <option value="2">Title</option>
            <option value="3">Category</option>
        </select>
    </div>
    <div class="col-md-6">
        <input type="text" name="searchText" class="form-control" id="floatingInput" placeholder="Search">
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

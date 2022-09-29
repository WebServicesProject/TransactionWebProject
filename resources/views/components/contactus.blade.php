<form action="{{route('submit-message')}}" method="POST" id="contactUs">
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    @csrf
    <div class="mb-3 form-outline">
        <label for="password" class="form-label">Your Email</label>
        <input type="email" class="form-control text-center"  name="contactEmail" id="contactEmail"
               value="">
        <span class="text-danger">@error('contactEmail') {{$message}} @enderror</span>
    </div>
    <div class="mb-3 form-outline">
        <label for="password" class="form-label">Subject</label>
        <input type="text" class="form-control text-center"  name="subject" id="subject"
               value="">
        <span class="text-danger">@error('subject') {{$message}} @enderror</span>
    </div>
    <div class="mb-3 form-outline">
        <label for="content" class="form-label">Message</label>
        <textarea class="form-control" name="content" id="content" form="contactUs"></textarea>
    </div>
    <div class="mb-4" style="margin-top: 2%">
        <button class="btn btn-primary" type="submit">Send</button>
    </div>
</form>






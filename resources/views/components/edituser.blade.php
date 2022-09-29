
    <form action="{{route('user-update')}}" method="POST">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
            <div class="mb-3 form-outline">
                <label for="password" class="form-label">Old Password</label>
                <input type="password" class="form-control text-center"  name="oldPassword" id="oldPassword"
                       value="">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="mb-3 form-outline">
                <label for="password" class="form-label">New Password</label>
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
                <input type="text" class="form-control text-center"  name="email" id="email" value="{{$user->email}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="mb-4">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
    </form>


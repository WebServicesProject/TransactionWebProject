<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="{{(str_contains(request()->url(),'dashboard')?'active':'')}}"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="{{(str_contains(request()->url(),'/search-page')?'active':'')}}"><a href="{{route('search-page')}}">Search Book</a></li>
        <li class="{{(str_contains(request()->url(),'/user/edit')?'active':'')}}"><a href="{{route('user-edit')}}">Edit Information</a></li>
        <li class="{{(str_contains(request()->url(),'/check-loan')?'active':'')}}"><a href="{{route('check-loan')}}">Check Loan Status</a></li>
        <li class="{{(str_contains(request()->url(),'/contact-us')?'active':'')}}"><a href="{{route('contact-us')}}">Contact Us</a></li>
    </ul>
    <div class="vr"></div>
</div>

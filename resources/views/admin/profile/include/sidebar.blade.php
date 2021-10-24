<div class="card" style="width: 18rem;">
    <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" class="card-img-top" alt="card-img-top" style="width: 100px"height="100px">
    <ul class="list-group list-group-flush">
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{route('user.dashboard')}}" class="btn btn-primary btn-sm btn-block">Edit Profile</a>
        <a href="{{route('admin.image')}}" class="btn btn-primary btn-sm btn-block">Update Image</a>
        <a href="{{route('admin.profile.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>


        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block"  onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();"> LogOut</a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>


    </ul>
</div>
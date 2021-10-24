@extends('layouts.frontend-master')

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
            <div class="row">
                <div class="col-sm-4">
                   @include('user.include.sidebar')
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">HI|</span><strong class="text-warning">

                                {{\Illuminate\Support\Facades\Auth::user()->name}}</strong> Update Your Password </h3>
                        <div class="card-body">
                            <form action="{{route('password-store')}}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Old Password</label>
                                    <input type="password" name="old_password" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Old Password">
                                    @error('old_password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail">New Password</label>
                                    <input type="password" name="new_password" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="New Password">
                                    @error('new_password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail"> Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Retype Password">
                                    @error('password_confirmation')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Change Password</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
@endsection

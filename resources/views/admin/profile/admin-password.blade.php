@extends('layouts.admin-master')

@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">E_Commerce</a>
            <span class="breadcrumb-item active">Profile</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">


                <div class="col-sm-4">
                    @include('admin.profile.include.sidebar')
                </div>
                <div class="col-sm-8">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">HI|</span><strong class="text-warning">

                                {{\Illuminate\Support\Facades\Auth::user()->name}}</strong> Update Your Password </h3>
                        <div class="card-body">
                            <form action="{{route('admin.store.password')}}" method="post" >
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


            </div><!-- row -->

            <!-- row -->

        </div><!-- sl-pagebody -->
        <footer class="sl-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
                <div>Made by Islami Bank Foundation.</div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Share:</span>
                <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
            </div>
        </footer>
    </div>
@endsection
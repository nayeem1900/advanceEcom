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

                                {{\Illuminate\Support\Facades\Auth::user()->name}}</strong> Update Your Profile </h3>
                        <div class="card-body">
                            <form action="{{route('update-image')}}" method="post" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="old_image" value="{{\Illuminate\Support\Facades\Auth::user()->image}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Image</label>
                                    <input type="file" name="image" class="form-control" id="image" aria-describedby="emailHelp" >
                                    @error('image')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Upload</button>
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

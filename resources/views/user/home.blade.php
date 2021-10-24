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
                           <form action="{{route('update.profile')}}" method="post" >
                               @csrf
                               <div class="form-group">
                                   <label for="exampleInputEmail">Name</label>
                                   <input type="text" name="name" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                   @error('name')
                                   <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <label for="exampleInputEmail">Phone</label>
                                   <input type="text" name="phone" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}">
                                   @error('phone')
                                   <span class="text-danger">{{$message}}</span>
                                   @enderror
                               </div>
                               <div class="form-group">
                                   <button type="submit" class="btn btn-danger">Submit</button>
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

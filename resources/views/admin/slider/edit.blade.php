@extends('layouts.admin-master')'
@section('sliders')
    active
@endsection

@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Slider</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Slider</h6>


                <form action="{{route('slider-update')}}" method="post"enctype="multipart/form-data">


                    @csrf
                    <input type="hidden"name="old_image" value="{{$slider->image}}">
                    <input type="hidden"name="id" value="{{$slider->id}}">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            @if($slider->title_en==null)
                                @else

                            <div class="form-group">
                                <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title_en" value="{{$slider->title_en}}" placeholder="Enter Slider Title EN">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="title_bn" value="{{$slider->title_bn}}" placeholder="Enter Slider Title BN">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Description: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="description_en" value="{{$slider->description_en}}" placeholder="Enter Slider Description EN">

                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Description: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="description_en" value="{{$slider->description_bn}}" placeholder="Enter Slider Description EN">

                            </div>
                        </div><!-- col-4 -->
                        @endif
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="image"  placeholder="Enter Image" >
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Slider Old Image: <span class="tx-danger">*</span></label>
                                <img src="{{asset($slider->image)}}" height="60px" width="100px">

                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update Slider</button>

                    </div><!-- form-layout-footer -->
                </form>

                <!-- form-layout -->
            </div><!-- card -->


        </div>

    </div>
@endsection
@extends('layouts.admin-master')'
@section('brands')
    active
@endsection

@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Brands</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Brand</h6>


               <form action="{{route('brand-update')}}" method="post"enctype="multipart/form-data">


                    @csrf
                    <input type="hidden"name="old_image" value="{{$brand->brand_image}}">
                    <input type="hidden"name="id" value="{{$brand->id}}">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="brand_name_en" value="{{$brand->brand_name_en}}" placeholder="Enter Brand Name English">
                                @error('brand_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="brand_name_bn" value="{{$brand->brand_name_bn}}" placeholder="Enter Brand Name Bangla">
                                @error('brand_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="file" name="brand_image"  placeholder="Enter Image" >
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update Brand</button>

                    </div><!-- form-layout-footer -->
               </form>

                <!-- form-layout -->
            </div><!-- card -->


</div>



    </div>
@extends('layouts.admin-master')

@section('categories')active show-sub @endsection
@section('add-category')active@endsection

@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Category</h6>


                <form action="{{route('update-category')}}" method="post"enctype="multipart/form-data">


                    @csrf

                    <input type="hidden"name="id" value="{{$category->id}}">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Icon: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="category_icon" value="{{$category->category_icon}}" placeholder="Enter category_icon">
                                @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="category_name_en" value="{{$category->category_name_en}}" placeholder="Enter category_name_bn">
                                @error('category_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Category Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="category_name_bn" value="{{$category->category_name_bn}}" placeholder="Enter category_name_bn">
                                @error('category_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update Category</button>

                    </div><!-- form-layout-footer -->
                </form>

                <!-- form-layout -->
            </div><!-- card -->


        </div>

    </div>
@endsection
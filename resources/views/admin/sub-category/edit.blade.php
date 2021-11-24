@extends('layouts.admin-master')

@section('categories')active show-sub @endsection

@section('sub-category')active@endsection
@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active"> Sub Category Update</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Sub Category</h6>


                <form action="{{route('subupdate-category')}}" method="post"enctype="multipart/form-data">


                    @csrf

                    <input type="hidden"name="id" value="{{$subcategory->id}}">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="category_id">
                                    <option label="Choose one"></option>
                                    @foreach( $categories as $cat)
                                        <option value="{{$cat->id}}" {{ $cat->id==$subcategory->category_id ? 'selected': '' }}>{{ucwords($cat->category_name_en)}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sub Category Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}" placeholder="Enter Sub category_name_en">
                                @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sub Category Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subcategory_name_bn" value="{{$subcategory->subcategory_name_bn}}" placeholder="Enter Sub category_name_bn">
                                @error('subcategory_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->


                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update Sub Category</button>

                    </div><!-- form-layout-footer -->
                </form>

                <!-- form-layout -->
            </div><!-- card -->


        </div>

    </div>
@endsection
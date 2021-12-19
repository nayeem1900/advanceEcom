@extends('layouts.admin-master')

@section('categories')active show-sub @endsection

@section('sub-sub-category')active@endsection
@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active"> Sub sub Category Update</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Sub sub Category</h6>


                <form action="{{route('update-sub-subcategory')}}" method="post"enctype="multipart/form-data">


                    @csrf

                    <input type="hidden"name="id" value="{{$subsubcat->id}}">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Sub-sub- Category Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subsubcategory_name_en" value="{{$subsubcat->subsubcategory_name_en}}" placeholder="Enter Sub ‍sub category_name_en">
                                @error('subsubcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <<div class="form-group">
                                <label class="form-control-label">Sub-sub-Category Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{$subsubcat->subsubcategory_name_bn}}" placeholder="Enter Sub sub category_name_bn">
                                @error('subsubcategory_name_bn')
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
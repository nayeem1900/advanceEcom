@extends('layouts.admin-master')

@section('products')active show-sub @endsection
@section('add-product')active@endsection
@section('admin-content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Add Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Form Layouts</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add Product</h6>


                <form action="{{route('update-category')}}" method="post"enctype="multipart/form-data">


                    @csrf


                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="brand_id">
                                    <option label="Choose one"></option>
                                    @foreach( $brands as $brand)
                                        <option value="{{$brand->id}}">{{ucwords($brand->brand_name_en)}}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="category_id">
                                    <option label="Choose one"></option>
                                    @foreach( $categories as $cat)
                                        <option value="{{$cat->id}}">{{ucwords($cat->category_name_en)}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="category_id">
                                    <option label="Choose one"></option>
                                    {{--@foreach( $categories as $cat)
                                        <option value="{{$cat->id}}">{{ucwords($cat->category_name_en)}}</option>
                                    @endforeach--}}
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub-Sub Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="category_id">
                                    <option label="Choose one"></option>
                                   {{-- @foreach( $categories as $cat)
                                        <option value="{{$cat->id}}">{{ucwords($cat->category_name_en)}}</option>
                                    @endforeach--}}
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_en" value="{{old('product_name_en')}}" placeholder="Enter Product _name_en">
                                @error('product_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_bn" value="{{old('product_name_bn')}}" placeholder="Enter Product _name_bn">
                                @error('product_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="Enter Product _code">
                                @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quqty: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_qty" value="{{old('product_qty')}}" placeholder="Enter Product _qty">
                                @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_en" value="{{old('product_tags_en')}}" placeholder="Enter Product _Tags_En">
                                @error('product_tags_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_bn" value="{{old('product_tags_bn')}}" placeholder="Enter Product _Tags_Bangla">
                                @error('product_tags_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_bn" value="{{old('product_size_bn')}}" placeholder="Enter Product _size_Bangla">
                                @error('product_size_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_en" value="{{old('product_size_en')}}" placeholder="Enter Product _size_English">
                                @error('product_size_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_en" value="{{old('product_color_en')}}" placeholder="Enter Product _Color_English">
                                @error('product_color_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_bn" value="{{old('product_color_bn')}}" placeholder="Enter Product _Color_Bangla">
                                @error('product_color_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" value="{{old('selling_price')}}" placeholder="Enter selling_price">
                                @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price" value="{{old('discount_price')}}" placeholder="Enter discount_price">
                                @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                                <textarea name="short_descp_en"id="summernote"cols="30"rows="10"></textarea>
                                @error('short_descp_en')
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
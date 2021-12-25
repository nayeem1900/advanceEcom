@extends('layouts.admin-master')

@section('products')active show-sub @endsection
@section('manage-product')active@endsection
@section('admin-content')


    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Update Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Update Product</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Update Product</h6>


                <form action="{{route('update-product-data')}}" method="post"enctype="multipart/form-data">


                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">


                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Brand: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="brand_id">
                                    <option label="Choose one"></option>
                                    @foreach( $brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id==$product->brand_id ? 'selected' :''}}>{{ucwords($brand->brand_name_en)}}</option>
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
                                        <option value="{{$cat->id}}" {{$cat->id==$product->category_id ? 'selected' :''}}>{{ucwords($cat->category_name_en)}}</option>
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
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="subcategory_id">
                                    <option label="Choose one"></option>
                                    {{--@foreach( $categories as $cat)
                                        <option value="{{$cat->id}}">{{ucwords($cat->category_name_en)}}</option>
                                    @endforeach--}}
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Select Sub-Sub Category: <span class="tx-danger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select Category" name="subsubcategory_id">
                                    <option label="Choose one"></option>
                                    {{-- @foreach( $categories as $cat)
                                         <option value="{{$cat->id}}">{{ucwords($cat->category_name_en)}}</option>
                                     @endforeach--}}
                                </select>
                                @error('subsubcategory_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_en" value="{{$product->product_name_en}}" placeholder="Enter Product _name_en">
                                @error('product_name_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name_bn" value="{{$product->product_name_bn}}" placeholder="Enter Product _name_bn">
                                @error('product_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product _code">
                                @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Quqty: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_qty" value="{{$product->product_qty}}" placeholder="Enter Product _qty">
                                @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_en" value="{{$product->product_tags_en}}" placeholder="Enter Product _Tags_En">
                                @error('product_tags_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Tags Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_tags_bn" value="{{$product->product_tags_bn}}" placeholder="Enter Product _Tags_Bangla">
                                @error('product_tags_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_bn" value="{{$product->product_size_bn}}" placeholder="Enter Product _size_Bangla" data-role="tagsinput">
                                @error('product_size_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size_en" value="{{$product->product_size_en}}" placeholder="Enter Product _size_English" data-role="tagsinput">
                                @error('product_size_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color English: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_en" value="{{$product->product_color_en}}" placeholder="Enter Product _Color_English" data-role="tagsinput">
                                @error('product_color_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color Bangla: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color_bn" value="{{$product->product_color_bn}}" placeholder="Enter Product _Color_Bangla" data-role="tagsinput">
                                @error('product_color_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" value="{{$product->selling_price}}" placeholder="Enter selling_price">
                                @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Discount Price: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}" placeholder="Enter discount_price">
                                @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Short Description English: <span class="tx-danger">*</span></label>
                                <textarea name="short_descp_en"id="summernote">{{$product->short_descp_en}}</textarea>
                                @error('short_descp_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Short Description BN: <span class="tx-danger">*</span></label>
                                <textarea name="short_descp_bn"id="summernote2">{{$product->short_descp_bn}}</textarea>
                                @error('short_descp_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Long Description English: <span class="tx-danger">*</span></label>
                                <textarea name="long_descp_en"id="summernote3" >{{$product->long_descp_en}}</textarea>
                                @error('long_descp_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Long Description Bangla: <span class="tx-danger">*</span></label>
                                <textarea name="long_descp_bn"id="summernote4" >{{$product->long_descp_bn}}</textarea>
                                @error('long_descp_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox"  name="hot_deals" value="1" {{ $product->hot_deals == 1 ?'checked':'' }}><span>Hot Deals</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="featured" value="1" {{ $product->featured== 1 ? 'checked':'' }}><span>Featured</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox"  name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked': '' }}><span>Special_Offer</span>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked':'' }}><span>Special_Deals</span>
                            </label>
                        </div>





                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update Product</button>

                    </div><!-- form-layout-footer -->
                </form>
                <!-- form-layout -->
                <div class="row row-sm" style="margin-top:30px;">
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($product->product_thambnail) }}" alt="Card image cap" style="height: 150px; width:150px;">
                            <div class="card-body">
                                <p class="card-text">
                                <div class="form-group">
                                    <label class="form-control-label">Change Image<span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="product_thambnail" onchange="mainThambUrl(this)">
                                </div>
                                <img src="" id="mainThmb">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!---Multu IMage show--->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <h4>Update Product Multiple Image</h4>
                    <div class="row row-sm" style="margin-top:50px;">

                        @foreach ($multiImgs as $img)
                            <div class="col-md-3">
                                <div class="card" >
                                    <img class="card-img-top" src="{{ asset($img->photo_name) }}" alt="Card image cap" style="height: 150px; width:150px;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ url('admin/product/multiimg/delete/'.$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
                                        </h5>
                                        <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image<span class="tx-danger">*</span></label>
                                            <input class="form-control" type="file" name="multiImg[{{ $img->id }}]" >
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info">Update Image</button>
                    </div><!-- form-layout-footer -->
                </form>



            </div><!-- card -->


        </div>
        {{-- <div class="col-lg-4">
               <div class="form-group">
                   <label class="form-control-label">Main Thambnail: <span class="tx-danger">*</span></label>
                   <input class="form-control" type="file" name="product_thambnail" value="" onchange="mainThambUrl(this)">
                   @error('product_thambnail')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
                   <img src="" id="mainThmb">
               </div>
           </div><!-- col-4 -->
           <div class="col-lg-4">
               <div class="form-group">
                   <label class="form-control-label">Multiple Image: <span class="tx-danger">*</span></label>
                   <input class="form-control" type="file" name="multi_img[]" value="{{old('multi_img')}}"multiple id="multiImg">
                   @error('multi_img')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
               <div class="row" id="preview_img">

               </div>
           </div>--}}
    </div>



    <script src="{{asset('backend/lib/jquery-2.2.4.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
//                alert(category_id)
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/admin/subcategory/ajax/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            console.log(data);
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');

                            });

                        },

                    });
                } else {
                    alert('Category Not Found');
                }

            });

            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
//                alert(category_id)
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/admin/sub-subcategory/ajax/') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            console.log(data);
                            var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');

                            });

                        },

                    });
                } else {
                    alert('Category Not Found');
                }

            });

        });

    </script>

    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>

    <script>
        function mainThambUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);


            }
        }
    </script>


@endsection
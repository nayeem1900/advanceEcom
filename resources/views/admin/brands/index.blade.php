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

            <div class="row row-sm">

               <div class="col-md-8">
<div class="card">
    <div class="card-header">Brand List</div>
    <div class="card pd-20 pd-sm-40">
        <div class="card-body-title">


        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                <tr>
                    <th class="wd-30p">Brand Image</th>
                    <th class="wd-25p">Brand name English</th>
                    <th class="wd-25p">Brand Name Bn</th>

                    <th class="wd-20p">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $item)

                <tr>
                    <td>
                        <img src="{{asset($item->brand_image)}}"alt="" style="width: 80px;">
                    </td>
                    <td>{{$item->brand_name_en}}</td>
                    <td>{{$item->brand_name_bn}}</td>


                    <td>
                        <a href="{{url('admin/brand-edit/'.$item->id)}}" class="btn btn-primary btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i> </a>

                    </td>

                </tr>


                @endforeach

                </tbody>
            </table>
        </div><!-- table-wrapper -->
        </div>
        </div>


</div>


               </div>
                <div class="col-md-4">

                    <div class="card">
                        <div class="header">Add New Brand</div>
                            <div class="card-body">
                                <form action="{{route('brand-store')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Brand Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_en" value="{{old('brand_name_en')}}" placeholder="Enter Brand Name English">
                                    @error('brand_name_en')
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Brand Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="brand_name_bn" value="{{old('brand_name_bn')}}" placeholder="Enter Brand Name Bangla">
                                    @error('brand_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Brand Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="brand_image"  placeholder="Enter Image" >
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info mg-r-5">Add New</button>

                                </div>

                                </form>
                            </div>



                    </div>


                </div>


            </div>
        </div>






    </div>
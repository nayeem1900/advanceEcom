@extends('layouts.admin-master')'
@section('sliders')
    active
@endsection

@section('admin-content')

    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Advance Ecommerce</a>
            <span class="breadcrumb-item active">Sliders</span>
        </nav>

        <div class="sl-pagebody">

            <div class="row row-sm">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sliders List</div>
                        <div class="card pd-20 pd-sm-40">
                            <div class="card-body-title">


                                <div class="table-wrapper">
                                    <table id="datatable1" class="table display responsive nowrap">
                                        <thead>
                                        <tr>
                                            <th class="wd-30p">Slider Image</th>
                                            <th class="wd-25p">Brand name English</th>
                                            <th class="wd-25p">Brand Name Bn</th>

                                            <th class="wd-20p">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sliders as $item)

                                            <tr>
                                                <td>
                                                    <img src="{{asset($item->image)}}"alt="" style="width: 80px;">
                                                </td>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    @if($item->status==1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="{{url('admin/brand-edit/'.$item->id)}}" class="btn btn-primary btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('brand.delete',$item->id) }}" method="POST">
                                                        @csrf
                                                        <button href="{{route('brand.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </button>

                                                    </form>

                                                    @if($item->status==1)
                                                        <a href="{{ url('admin/product-inactive/'.$item->id) }}" class="btn btn-sm btn-success" title="inactive"> <i class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ url('admin/product-active/'.$item->id) }}" class="btn btn-sm btn-danger" title="active now data"> <i class="fa fa-arrow-up"></i></a>
                                                    @endif
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
                        <div class="header">Add New Slider</div>
                        <div class="card-body">
                            <form action="{{route('slider-store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="Enter Slider Title">

                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Slider Description: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="description" value="{{old('description')}}" placeholder="Enter Slider Description">

                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="file" name="image"  placeholder="Enter Image" >
                                    @error('mage')
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

@endsection
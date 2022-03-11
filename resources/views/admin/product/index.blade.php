@extends('layouts.admin-master')

@section('products')active show-sub @endsection
@section('manage-product')active@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">SHopMama</a>
            <span class="breadcrumb-item active">Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Product List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-20p">Image</th>
                                        <th class="wd-20p">Product Name English</th>
                                        <th class="wd-20p">Product Price</th>
                                        <th class="wd-15p">Product Quantity</th>
                                        <th class="wd-5p">Product Discount</th>
                                        <th class="wd-5p">Status</th>
                                        <th class="wd-15p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($item->product_thambnail) }}" alt="" style="height: 60px; width:60px;">
                                            </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->selling_price }}$</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>
                                                @if($item->discount_price == null)
                                                    <span class="badge badge-pill badge-danger">NO</span>
                                                    @else
                                                    @php
                                                    $amount = $item->selling_price - $item->discount_price;
                                                    $discount= ($amount/$item->selling_price )*100

                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount) }}%</span>
                                                    @endif
                                            </td>


                                               {{-- <td>{{ $item->discount_price }}</td>--}}
                                         <td>
                                             @if($item->status==1)
                                                <span class="badge badge-pill badge-success">Active</span>
                                                 @else
                                                 <span class="badge badge-pill badge-danger">Inactive</span>
                                              @endif
                                         </td>

                                            <td>
                                                <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-eye"></i></a>
                                                <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                                                {{--<form action="{{ route('product.delete',$item->id) }}" method="POST">
                                                    @csrf
                                                    <button href="{{route('product.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </button>
                                                </form>--}}

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
                    </div><!-- card -->
                </div>

            </div>
        </div>
    </div>

@endsection


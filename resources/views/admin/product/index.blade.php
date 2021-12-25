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
                                            <td>{{ $item->discount_price }}</td>
                                         <td></td>
                                            <td></td>
                                            <td>
                                                <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                                                {{--<form action="{{ route('product.delete',$item->id) }}" method="POST">
                                                    @csrf
                                                    <button href="{{route('product.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </button>
                                                </form>--}}
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


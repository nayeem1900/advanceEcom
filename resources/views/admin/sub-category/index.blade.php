@extends('layouts.admin-master')

@section('categories')active show-sub @endsection

@section('sub-category')active@endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">SHopMama</a>
            <span class="breadcrumb-item active">Sub Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Sub Category List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-30p">Category Name</th>
                                        <th class="wd-25p">Sub Category name En</th>
                                        <th class="wd-25p">Sub Category name Bn</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subcategories as $item)
                                        <tr>
                                            <td>
                                               {{$item['category']['category_name_en']}}
                                            </td>
                                            <td>{{ $item->subcategory_name_en }}</td>
                                            <td>{{ $item->subcategory_name_bn }}</td>
                                            <td>
                                                <a href="{{ url('admin/subcategory-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                                                <form action="{{ route('subcategory.delete',$item->id) }}" method="POST">
                                                    @csrf
                                                    <button href="{{route('subcategory.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div><!-- card -->
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add New Sub Category</div>
                        <div class="card-body">
                            <form action="{{route('subcategory-store')}}" method="POST">
                                @csrf
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

                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_en" value="{{ old('subcategory_name_en') }}" placeholder="Enter Sub category_name_en">
                                    @error('subcategory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}" placeholder="Enter Sub category_name_bn">
                                    @error('subcategory_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info"> Sub Category Add</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


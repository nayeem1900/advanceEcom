@extends('layouts.admin-master')

@section('categories')active show-sub @endsection

@section('sub-sub-category')active@endsection
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
                        <div class="card-header">Sub sub Category List</div>
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-30p">Category Name</th>
                                        <th class="wd-25p">Sub Category name</th>
                                        <th class="wd-25p">Sub-SubCategory name En</th>
                                        <th class="wd-25p">Sub-SubCategory name Bn</th>
                                        <th class="wd-20p">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subsubcategories as $item)
                                        <tr>
                                            {{--<td>
                                                {{$item['category']['category_name_en']}}
                                            </td>--}}
                                            <td>{{ $item->category->category_name_en }}</td>
                                            <td>{{ $item->subcategory->subcategory_name_en }}</td>
                                            <td>{{ $item->subsubcategory_name_en }}</td>
                                            <td>{{ $item->subsubcategory_name_bn }}</td>
                                            <td>
                                                <a href="{{ url('admin/sub-subcategory-edit/'.$item->id) }}" class="btn btn-sm btn-primary" title="edit data"> <i class="fa fa-pencil"></i></a>

                                                <form action="{{ route('subsubcategory.delete',$item->id) }}" method="POST">
                                                    @csrf
                                                    <button href="{{route('subsubcategory.delete',$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i> </button>
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
                        <div class="card-header">Add New Sub Sub Category</div>
                        <div class="card-body">
                            <form action="{{route('sub-subcategory-store')}}" method="POST">
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
                                    <label class="form-control-label">Select Sub Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2-show-search" data-placeholder="Select Category" name="subcategory_id">
                                        <option label="Choose one"></option>

                                    </select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Sub-sub- Category Name English: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ old('subsubcategory_name_en') }}" placeholder="Enter Sub category_name_en">
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Sub-sub-Category Name Bangla: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{ old('subsubcategory_name_bn') }}" placeholder="Enter Sub category_name_bn">
                                    @error('subsubcategory_name_bn')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info"> Sub-sub-Category Add</button>
                                </div><!-- form-layout-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        });

    </script>

@endsection


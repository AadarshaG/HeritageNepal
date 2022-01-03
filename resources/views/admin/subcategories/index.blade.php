@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Sub Categories
                </h3>
                <div class="pull-right">
                        <a href="{{url('subcategory/add')}}" class="btn btn-primary">Add Subcategory</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>SubCategory Name</th>
                        <th>Parent category</th>
                        <th>Created_by</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($subcategories  as $subcategory)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$subcategory->subcategory_name}}</td>
                            <td>{{$subcategory->parentCategory->category_name}}</td>
                            <td>{{$subcategory->createdBy->name}}</td>                       
                            <td>
                                <a href="{{url('subcategory/edit', $subcategory->id)}}" class="btn btn-primary btn-sm" title="Edit Subcategory "><i class=" fa fa-edit"></i> Edit</a>

                                <a onclick="return confirm('Are You sure to Delete ?')" href="{{url('subcategory/delete', $subcategory->id)}}" class="btn btn-danger btn-sm" title="Delete Subcategory "><i class=" fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
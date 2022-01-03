@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                     Categories
                </h3>
                <div class="pull-right">
                    <a href="{{url('category/add')}}" class="btn btn-primary">Add Category</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Category Name</th>
                        <th>Created_by</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($categories  as $category)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->createdBy->name}}</td>
                            <td>
                               <a href="{{url('category/edit', $category->id)}}" class="btn btn-primary btn-sm" title="Edit category "><i class=" fa fa-edit"></i> Edit</a>

                               <a onclick="return confirm('Are You sure to Delete ?')" href="{{url('category/delete', $category->id)}}" class="btn btn-danger btn-sm" title="Delete Category "><i class=" fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                  
                </table>
            </div>
        </div>
    </div>
@endsection
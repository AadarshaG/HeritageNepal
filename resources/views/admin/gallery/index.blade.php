@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Gallery Images
                </h3>
                <div class="pull-right">
                    <a href="{{url('gallery-image/add')}}" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Service Name</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($gallery  as $gall)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$gall->title}}</td>
                            <td>{{$gall->service['title']}}</td>
                            <td>
                                <img src="{{ asset('uploads/gallery/'.$gall->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('gallery-image/edit', $gall->id)}}" class="btn btn-primary btn-sm" title="Edit Product "><i class=" fa fa-trash"></i> Edit</a>
                                <a href="{{url('gallery-image/delete', $gall->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

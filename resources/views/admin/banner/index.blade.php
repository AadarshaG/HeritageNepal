@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Banner Images
                </h3>
                <div class="pull-right">
                    <a href="{{url('banner-image/add')}}" class="btn btn-primary">Add Banner</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($banner  as $ban)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$ban->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/banner/'.$ban->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                @if($ban->enabled == 1)
                                    Enabled <a href="{{url('banner-image/disable', $ban->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('banner-image/enable', $ban->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('banner-image/delete', $ban->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

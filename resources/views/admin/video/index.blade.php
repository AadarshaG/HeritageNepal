@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Video Gallery
                </h3>
                <div class="pull-right">
                    <a href="{{url('video-gallery/add')}}" class="btn btn-primary">Add Video</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($videos  as $vid)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$vid->title}}</td>
                            <td>
                                @if($vid->enabled == 1)
                                    Enabled <a href="{{url('video-gallery/disable', $vid->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('video-gallery/enable', $vid->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif

                            </td>
                            <td>
                                <a href="{{url('video-gallery/delete', $vid->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

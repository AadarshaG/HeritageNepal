@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Inquiry Messages
                </h3>
                <div class="pull-right">
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Service Name</th>
                    <th>Sender Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($inquiry as $inq)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$inq->service_name}}</td>
                            <td>
                                {{$inq->full_name}}
                            </td>
                            <td>
                                {{$inq->phone}}
                            </td>
                            <td>
                                @if($inq->enabled == 1)
                                     <a href="{{url('inquiry/disable', $inq->id)}}" class="btn btn-success btn-xs">Read</a>
                                @else
                                     <a href="{{url('inquiry/enable', $inq->id)}}" class="btn btn-danger btn-xs"> UnRead</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('inquiry/show', $inq->id)}}" class="btn btn-primary btn-sm" title="SHow Product "><i class=" fa fa-eye"></i>Show</a>
                                <a href="{{url('inquiry/delete', $inq->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i>Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

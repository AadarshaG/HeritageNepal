@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Why Choose Us
                </h3>
                <div class="pull-right">
                    <a href="{{url('why-choose-us/add')}}" class="btn btn-primary">Add</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($choose  as $choo)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$choo->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/choose/'.$choo->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('why-choose-us/delete', $choo->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-trash">Delete</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    About Us
                </h3>
                <div class="pull-right">
{{--                    <a href="{{url('about-us/add')}}" class="btn btn-primary">Add</a>--}}
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
                    @foreach($about  as $abt)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$abt->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/about/'.$abt->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('about-us/show', $abt->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye">Show</i>
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

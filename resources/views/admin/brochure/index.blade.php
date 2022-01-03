@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Brochure
                </h3>
                <div class="pull-right">
{{--                    <a href="{{url('brochure/add')}}" class="btn btn-primary">Add</a>--}}
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
                    @foreach($brochure as $bro)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$bro->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/brochure/'.$bro->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('brochure/edit', $bro->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye">Edit</i>
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

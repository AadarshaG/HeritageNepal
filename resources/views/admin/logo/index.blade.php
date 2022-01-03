@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Logo Image
                </h3>
                <div class="pull-right">
{{--                    <a href="{{url('logo/add')}}" class="btn btn-primary">Add</a>--}}
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
                    @foreach($logos  as $logo)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$logo->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/logo/'.$logo->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('logo/edit', $logo->id)}}" class="btn btn-primary btn-sm" title="Delete Product "><i class=" fa fa-edit"></i>Edit</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

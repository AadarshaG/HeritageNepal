@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                   Social Links
                </h3>
                <div class="pull-right">
                    <a href="{{url('social-link/add')}}" class="btn btn-primary">Add Link</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Link</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($social  as $soc)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$soc->title}}</td>
                            <td>
                                <img src="{{asset('uploads/social/'.$soc->icon)}}" alt="" height="80px;">
                            </td>
                            <td>{{$soc->link}}</td>
                            <td>
                                <a href="{{url('social-link/edit', $soc->id)}}" class="btn btn-info btn-sm" title="View  Details">
                                    <i class="fa fa-eye">Edit</i>
                                </a>
                                <a href="{{url('social-link/delete', $soc->id)}}" class="btn btn-danger btn-sm" title="Delete Product "><i class=" fa fa-trash"></i>Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

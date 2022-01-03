@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Blogs
                </h3>
                <div class="pull-right">
                    <a href="{{url('blog/add')}}" class="btn btn-primary">Add Blog</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($blogs  as $blg)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$blg->title}}</td>
                            <td>{{$blg->author}}</td>
                            <td>
                                <img src="{{ asset('uploads/blog/'.$blg->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                <a href="{{url('blog/show', $blg->id)}}" class="btn btn-info btn-sm" title="View  Details">
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

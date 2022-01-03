@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Pages
                </h3>
                <div class="pull-right">
{{--                    <a href="{{url('pages/add')}}" class="btn btn-primary">Add Page</a>--}}
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $i = 0;?>
                    @foreach($pages  as $page)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$page->title}}</td>
                            <td>
                                {!! \Illuminate\Support\Str::limit($page->description,30) !!}
                            </td>
                            <td>
                                <a href="{{url('pages/show', $page->id)}}" class="btn btn-info btn-sm" title="View  Details">
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

@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Testimonials
                </h3>
                <div class="pull-right">
                    <a href="{{url('testimonial/add')}}" class="btn btn-primary">Add Testimonial</a>
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
                    @foreach($testimonial  as $test)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$test->title}}</td>
                            <td>
                                <img src="{{ asset('uploads/testimonial/'.$test->image) }}" alt="" height="80px;">
                            </td>
                            <td>
                                @if($test->enabled == 1)
                                    Enabled <a href="{{url('testimonial/disable', $test->id)}}" class="btn btn-danger btn-xs">Disable</a>
                                @else
                                    Disabled <a href="{{url('testimonial/enable', $test->id)}}" class="btn btn-success btn-xs"> Enable</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('testimonial/show', $test->id)}}" class="btn btn-info btn-sm" title="View  Details">
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

@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Testimonial Details
                        <div class="pull-right">
                            <a href="{{ url('testimonial/add') }}" class="btn btn-primary">Add Testimonial</a>

                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{asset('uploads/testimonial'.'/'.$testimonial->image)}}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $testimonial->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Position</strong> : {{ $testimonial->position }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $testimonial->description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $testimonial->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $testimonial->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('testimonial/edit', $testimonial->id)}}" class="btn btn-primary"> Edit This Testimonial</a>
                </div>
            </div>
        </div>


    </div>
@endsection

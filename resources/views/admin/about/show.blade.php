@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        About Us Details
                        <div class="pull-right">
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
                                <img src="{{asset('uploads/about'.'/'.$about->image)}}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $about->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $about->description !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Title</strong> : {{ $about->meta_title  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Keyword</strong> : {{ $about->meta_keyword }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Description</strong> : {!! $about->meta_description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $about->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $about->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('about-us/edit', $about->id)}}" class="btn btn-primary"> Edit This Product</a>
                </div>
            </div>
        </div>


    </div>
@endsection

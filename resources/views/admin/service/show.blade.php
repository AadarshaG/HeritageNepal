@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        ServiceDetails
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
                                <img src="{{asset('uploads/service'.'/'.$service->image)}}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $service->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $service->description !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Title</strong> : {{ $service->meta_title  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Keyword</strong> : {{ $service->meta_keyword }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Description</strong> : {!! $service->meta_description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $service->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $service->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('services/edit', $service->id)}}" class="btn btn-primary"> Edit This Service</a>
                </div>
            </div>
        </div>


    </div>
@endsection

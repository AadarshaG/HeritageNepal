@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Page Details
                        <div class="pull-right">
                        </div>
                    </h3>
                </div>
                <div class="box-body" >

                    <ul class="list-group col-md-12">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $page->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $page->description !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $page->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $page->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('pages/edit', $page->id)}}" class="btn btn-primary"> Edit This Page</a>
                </div>
            </div>
        </div>


    </div>
@endsection

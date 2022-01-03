@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Blog Details
                        <div class="pull-right">
                            <a href="{{ url('blog/add') }}" class="btn btn-primary">Add Blog</a>

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
                                <img src="{{asset('uploads/blog'.'/'.$blog->image)}}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $blog->title }}
                        </li>
                        <li class="list-group-item">
                            <strong>Description</strong> : {!! $blog->description !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Title</strong> : {{ $blog->meta_title  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Keyword</strong> : {{ $blog->meta_keyword }}
                        </li>

                        <li class="list-group-item">
                            <strong>Meta Description</strong> : {!! $blog->meta_description !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $blog->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $blog->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('blog/edit', $blog->id)}}" class="btn btn-primary"> Edit This Blog</a>
                </div>
            </div>
        </div>


    </div>
@endsection

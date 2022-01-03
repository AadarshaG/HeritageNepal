@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Gallery Image</h3>
            </div>
            <div class="box-body">
                    <form class="form-horizontal" method="post" action="{{url('gallery-image/update', $gallery->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$gallery->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($gallery))
                        <div class="col-md-3">
                            <img src="{{asset('uploads/gallery/'.$gallery->image)}}" alt="" height="80px;">
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Client Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="client_title" value="{{$gallery->client_title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Location:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="location" value="{{$gallery->location}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Service Provided:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="service_provided" value="{{$gallery->service_provided}}">
                        </div>
                    </div>

                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

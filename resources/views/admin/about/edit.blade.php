@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit About Us</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('about-us/update', $about->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$about->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($about))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/about'.'/'.$about->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">PDF:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="pdf">
                        </div>
                        @if(isset($about))
                            <div class="col-md-4">
                               <span>{{$about->pdf}}</span>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8"  class="form-control" type="text"  name="description">{{$about->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="meta_title" value="{{$about->meta_title}}" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Keyword:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="meta_keyword" value="{{$about->meta_keyword}}" placeholder="Meta Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Description:</label>
                        <div class="col-md-6">
                            <textarea rows="4" class="form-control" type="text" id="meta_description" name="meta_description" placeholder="Meta Description">{{$about->meta_description}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

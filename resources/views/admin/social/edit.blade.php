@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Social Link</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('social-link/update', $social->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$social->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Image:</label>
                        <div class="col-md-4">
                            <input  class="form-control" type="file" name="icon">
                        </div>
                        @if(isset($social))
                        <div class="col-md-2">
                            <img src="{{asset('uploads/social/'.$social->icon)}}" alt="" height="80px;">
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Link:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="link" value="{{$social->link}}">
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

@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Logo Image</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('logo/update', $logo->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$logo->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($logo))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/logo'.'/'.$logo->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Brochure Info</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('brochure/update', $brochure->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$brochure->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($brochure))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/brochure'.'/'.$brochure->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">PDF:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="pdf">
                        </div>
                        @if(isset($brochure))
                            <div class="col-md-4">
                                <span>{{$brochure->pdf}}</span>
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

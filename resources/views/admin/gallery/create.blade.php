@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Gallery Image</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('gallery-image/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}


                    <div class="form-group">
                        <label class="col-md-4 control-label">Service Name:</label>
                        <div class="col-md-6">
                            <select name="service_id" id="" class="form-control" required>
                                <option selected disabled>-- Select Service --</option>
                                @foreach($services as $servi)
                                <option value="{{$servi->id}}">{{$servi->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Image:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="image" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Client Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="client_title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Location:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="location" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Service Provided:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="service_provided" required>
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

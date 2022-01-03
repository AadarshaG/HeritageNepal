@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Contact Info</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('contact-info/update', $info->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Address:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="address" value="{{$info->address}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Phone:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="phone" value="{{$info->phone}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Mail:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="mail" value="{{$info->mail}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"> Iframe:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="iframe" value="{{$info->iframe}}">
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

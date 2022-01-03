@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Contact Us</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('contact-info/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}


                        <div class="form-group">
                            <label class="col-md-4 control-label">Address:</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="address" required>
                            </div>
                         </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone:</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mail:</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="mail" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Iframe:</label>
                            <div class="col-md-6">
                                <input  class="form-control" type="text" name="iframe" required>
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

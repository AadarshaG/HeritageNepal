@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Social Link</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('social-link/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}


                    <div class="form-group">
                        <label class="col-md-4 control-label">Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="icon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Link:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="link" required>
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

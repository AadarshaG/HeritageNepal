@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Blog</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('blog/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}


                    <div class="form-group">
                        <label class="col-md-4 control-label">Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Author:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="author" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"> Image:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="image" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8" class="form-control" type="text" id="description" name="description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="meta_title" placeholder="Meta Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Keyword:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="meta_keyword" placeholder="Meta Keyword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Meta Description:</label>
                        <div class="col-md-6">
                            <textarea rows="4" class="form-control" type="text" id="meta_description" name="meta_description" placeholder="Meta Description"></textarea>
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

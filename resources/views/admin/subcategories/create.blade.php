@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="box box-primary">
        @include('flashMsg.flashmessages')
        <div class="box-header">
            <h3>Add Subcategory</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="{{url('subcategory/store')}}">
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-md-4 control-label">Select Category:</label>
                <div class="col-md-6">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Subcategory Name:</label>
                <div class="col-md-6">
                    <input  class="form-control" type="text" name="subcategory_name" placeholder="Name" required>
                </div>
            </div>
            
            <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
            <div class="col-md-offset-4">
                <button class="btn btn-primary">Add Subcategory</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection
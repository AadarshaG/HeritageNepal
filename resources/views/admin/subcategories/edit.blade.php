@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="box box-primary">
        @include('flashMsg.flashmessages')
        <div class="box-header">
            <h3>Edit Subcategory</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="{{url('subcategory/update', $subcategory->id)}}">
            @method('PUT')
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-md-4 control-label">Select Category:</label>
                <div class="col-md-6">
                    <select name="category_id" class="form-control">
                        <option value="{{$subcategory->category_id}}">{{$subcategory->parentCategory->category_name}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Subcategory Name:</label>
                <div class="col-md-6">
                    <input  class="form-control" type="text" name="subcategory_name" value="{{$subcategory->subcategory_name}}" required>
                </div>
            </div>
            
            <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
            <div class="col-md-offset-4">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection
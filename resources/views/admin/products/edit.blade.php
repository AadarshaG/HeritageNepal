@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Product</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('admin-product/update', $product->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Select Category:</label>
                        <div class="col-md-6">
                            <select name="category_id" class="form-control" id="category">
                                <option value="{{$product->category_id}}">
                                    {{$product->parentCategory->category_name}}
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="product_name" value="{{$product->product_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8"  class="form-control" type="text"  name="description">{{$product->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Price:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="price" value="{{$product->price}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">In Stock:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="in_stock"
                                    value="{{$product->in_stock}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Product Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($product))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/product'.'/'.$product->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Description PDF:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="pdf">
                        </div>
                        @if(isset($product))
                            <div class="col-md-4">
                                <span>{{$product->pdf}}</span>
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

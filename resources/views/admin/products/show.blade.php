@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Product Details
                        <div class="pull-right">
                            <a href="{{ url('admin-product/add') }}" class="btn btn-primary">Add Product</a>
                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{asset('uploads/product'.'/'.$product->image)}}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $product->product_name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Category</strong> : {{ $product->parentCategory->category_name }}
                        </li>

                        <li class="list-group-item">
                            <strong>Description</strong> : {{ $product->description }}
                        </li>
                        <li class="list-group-item">
                            <strong>Featured</strong> :
                            @if($product->featured == 1)
                                Featured <a href="{{url('admin-product/notfeatured', $product->id)}}" class="btn btn-danger btn-xs">UnFeatured This Product</a>
                            @else
                                Not Featured <a href="{{url('admin-product/featured', $product->id)}}" class="btn btn-success btn-xs"> Featured This Product</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>Special</strong> :
                            @if($product->special == 1)
                                Special <a href="{{url('admin-product/notspecial', $product->id)}}" class="btn btn-danger btn-xs">Remove From Special This Product</a>
                            @else
                                Not Special <a href="{{url('admin-product/special', $product->id)}}" class="btn btn-success btn-xs"> Make Special This Product</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong> Price</strong> : {{ $product->price }}
                        </li>

                        <li class="list-group-item">
                            <strong>Enabled</strong> :
                            @if($product->enabled == 1)
                                Enabled <a href="{{url('admin-product/disable', $product->id)}}" class="btn btn-danger btn-xs">Disable This Product</a>
                            @else
                                Disabled <a href="{{url('admin-product/enable', $product->id)}}" class="btn btn-success btn-xs"> Enable This Product</a>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <strong>In stock</strong> : {{ $product->in_stock }}
                        </li>

                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $product->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $product->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('admin-product/edit', $product->id)}}" class="btn btn-primary"> Edit This Product</a>
                </div>
            </div>
        </div>


    </div>
@endsection

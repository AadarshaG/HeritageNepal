@extends('layouts.frontend')
@section('content')
<section class="htc__category__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">Search Results</h2>
                        <h4> {{$search_results->count()}} Products Found</h4>
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="row">
                    <div class="product__list">
                       <!-- Start Single Category -->
                        @foreach($search_results as $product)
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="{{url('product/details', $product->id)}}">
                                        <img src="{{ $product->getMedia('product_images')->first()->getUrl() }}" alt="product images">
                                    </a>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="{{url('product/details', $product->id)}}">{{$product->product_name}}</a></h4>
                                    <ul class="fr__pro__prize">
                                        <li>Rs. {{$product->UserRole_Price()}}</li>
                                    </ul>
                                    <div>
                                        <a class="btn cart_button" href="{{url('product/details', $product->id)}}">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
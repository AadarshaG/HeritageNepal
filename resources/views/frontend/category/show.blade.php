@extends('layouts.frontend')

@section('main-content')
    <div class="w-50 m-auto">
        <h1 class="mb-2 mt-5 fw-bold border-bottom ">
            {{$category->category_name}}
        </h1>

    </div>

    <section class=" p-lg-4 p-md-2 p-0">
        <main class="container ">
            <div class="row">
                <div class="col-md-3  p-4">
                    <div class="hn-bg-light mb-4 p-2">
                        <h4 class="border-bottom fw-bold">Category</h4>
                        @php
                            $categoryy = DB::table('categories')->select('*')->orderBy('category_name','asc')->get();
                        @endphp
                        @php $i= 0; @endphp
                        @foreach($categoryy as $cat)
                            <ul class="list-group list-group-flush ">
                                @php
                                    $subcats = DB::table('sub_categories')->select('*')->orderBy('subcategory_name','asc')->where('category_id',$cat->id)->get();
                                @endphp
                                <li class="list-group-item bg-transparent border-0">
                                    @if($subcats->count() > 0)
                                        <a class="hn-txt-darkPurple" data-bs-toggle="collapse" href="#a{{$i}}" role="button" aria-expanded="false" aria-controls="a{{$i}}">
                                            {{$cat->category_name}}
                                        </a>
                                    @else
                                        <a class="hn-txt-darkPurple" data-bs-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="">
                                            <a href="{{url('category/'.$cat->slug)}}">{{$cat->category_name}}</a>
                                        </a>
                                    @endif
                                    @if($subcats->count() > 0)
                                        <div class="collapse" id="a{{$i}}">
                                            <div class="card card-body bg-transparent border-0 p-0">
                                                <ul class="list-group border-0 list-group-flush">
                                                    @foreach($subcats as $subcat)
                                                        <li class="list-group-item bg-transparent py-1">
                                                            <a href="{{url('subcategory/'.$subcat->slug)}}" class="hn-txt-darkPurple">{{$subcat->subcategory_name}}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                            @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
                @if($products->count() > 0)
                <div class="col-md-9">
                    <div class="row px-lg-4 px-md-2 px-0">
                        @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-6 mb-4">
                            <article class="shadow hover-zoom hn-bg-light">
                                <a href="{{url('all-product/details/'.$product->slug)}}">
                                    <div class="">
                                        <figure style="height: 150px;">
                                            <img class="rounded-top object-cover" src="{{asset('uploads/product/'.$product->image)}}" alt="">
                                        </figure>
                                        <h6 class="p-3">
                                            <a href="{{url('all-product/details/'.$product->slug)}}" class="hn-txt-darkPurple">{{$product->product_name}}</a>
                                        </h6>
                                    </div>
                                </a>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-md-9">
                        <div class="row px-lg-4 px-md-2 px-0">
                            <p><strong>No Product Found.</strong></p>
                        </div>
                    </div>
                @endif
            </div>
        </main>

    </section>

@endsection

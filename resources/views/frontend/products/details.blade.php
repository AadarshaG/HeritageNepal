@extends('layouts.frontend')
@section('main-content')
    <div class="w-50 m-auto">
        <h4 class="mb-2 mt-5 fw-bold border-bottom ">
            {{$product->product_name}}
        </h4>

    </div>

    <section class=" p-lg-4 p-md-2 p-0">
        <main class="container ">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex flex-column-reverse flex-md-row">
                        <ul class="list-group list-group-flush d-flex flex-row flex-md-column m-auto">
                            <li class="list-group-item bg-transparent border-0 ">
                                <figure class="size-50">
                                    <img src="{{asset('uploads/product/'.$product->image)}}" alt="" onClick="changeDisplayImg(this);">
                                </figure>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ">
                                <figure class="size-50">
                                    <img src="{{asset('uploads/product/'.$product->image)}}" alt="" onClick="changeDisplayImg(this);">
                                </figure>
                            </li>
                            <li class="list-group-item bg-transparent border-0 ">
                                <figure class="size-50">
                                    <img src="{{asset('uploads/product/'.$product->image)}}" alt="" onClick="changeDisplayImg(this);">
                                </figure>
                            </li>


                        </ul>

                        <figure class="size-300 m-auto">
                            <img id="displayImg" src="{{asset('uploads/product/'.$product->image)}}" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="hn-darkPurple">{{$product->product_name}}</h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent ">
                            <strong> Category :</strong> <span>{{$product->parentCategory->category_name}}</span>
                        </li>
                        <li class="list-group-item bg-transparent ">
                            <strong> Status :</strong> <span>In Stock</span>
                        </li>
                        <li class="list-group-item bg-transparent ">
                            <strong> Details :</strong> <br>
                            <span>{!! $product->description !!}</span>
                        </li>

                    </ul>

                    <a href="{{url('productPdf/'.$product->id)}}" target="_blank">
                        <button class="btn hn-btn-darkPurple m-4">Download</button>
                    </a>
                </div>

            </div>
        </main>

    </section>

@endsection

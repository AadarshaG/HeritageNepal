@extends('layouts.frontend')
@section('main-content')
    <h1 class="my-5 fw-bold border-bottom w-50 m-auto text-center">
        About Us
    </h1>

    @if(!empty($about))
    <section id="about" class="container p-2">
        <main class="container ">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <h3 class="hn-title">{{$about->title}}</h3>
                    <p class="ps-4 py-2">{!! $about->description !!}</p>
                    <a href="{{url('aboutPdf/'.$about->id)}}" target="_blank">
                        <button class="btn hn-btn-darkPurple">Download</button>
                    </a>
                </div>
                <div class="col-md-6 m-auto">
                    <figure class="m-0 p-5">
                        <img src="{{asset('uploads/about/'.$about->image)}}" alt="">
                    </figure>
                </div>
            </div>


        </main>

    </section>
    @endif
@endsection

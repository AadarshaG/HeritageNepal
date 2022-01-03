@extends('layouts.frontend')
@section('main-content')
    <h1 class="my-5 fw-bold border-bottom w-50 m-auto text-center">
        Our Services
    </h1>
    @if(!empty($services))
    <section class=" p-4">
        <main class="container ">
            <div class="row mx-lg-5">
                @foreach($services as $key=>$service)
                <div class="col-lg-3 col-md-4 col-12 my-4">
                    <div class="bg-white ">
                        <a href="{{url('service/'.$service->slug)}}">
                            <div class="d-flex align-items-center ">
                                <span class="fs-3 hn-bg-grey py-1 px-4 text-white">{{++$key}}</span>
                                <h5 class="m-auto text-dark">{{$service->title}}</h5>
                            </div>
                            <div class="position-relative service-img">
                                <figure class="px-3 animate__animated animate__fadeIn">
                                    <img src="{{asset('uploads/service/'.$service->image)}}" alt="">
                                </figure>
                                <div class="position-absolute start-0 top-0 bottom-0 end-0 bg-secondary text-white opacity-50 animate__animated animate__fadeIn">
                                    <p class="p-3">{!! \Illuminate\Support\Str::limit($service->description,100) !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </section>
    @endif

@endsection

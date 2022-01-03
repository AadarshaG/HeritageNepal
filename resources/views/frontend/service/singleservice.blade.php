@extends('layouts.frontend')
@section('main-content')
    <div class="w-50 m-auto">
        <h1 class="mb-2 mt-5 fw-bold border-bottom ">
            {{$service->title}}
        </h1>
        <span></span>
    </div>

    <section class=" p-2">
        <main class="container ">
            <div class="row">
                @include('flashMsg.flashmessages')
                <div class="col-lg-9 col-md-12 p-4">
                    <h2>{{$service->title}}</h2>
                    <article>
                        <figure style='height:350px;'>
                            <img src="{{asset('uploads/service/'.$service->image)}}"class="object-cover" alt="">
                        </figure>

                        <p class="p-2 p-md-4">
                            {!! $service->description !!}
                        </p>

                    </article>

                    <div class="d-flex flex-column">
                        <a href="{{url('servicePdf/'.$service->id)}}" target="_blank">
                            <button class="btn hn-btn-darkPurple m-auto">Download Brochure</button>
                        </a>

                        <form class="m-auto mt-5" action="{{url('service/inquiry')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="service_name" value="{{$service->title}}">
                            <h3 class="p-4">Inquiry Form</h3>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="full_name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contact</label>
                                <input type="number" class="form-control" name="phone" id="exampleInputPassword1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Message</label>
                                <textarea type="text" name="message" class="form-control" id="exampleInputPassword1" required></textarea>
                            </div>

                            <button type="submit" class="btn hn-btn-darkPurple">Send</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <div class="hn-bg-light p-4">
                        <h4 class="border-bottom">Other Services</h4>
                        @if(!empty($recent_service))
                        <ul class="list-group list-group-flush">
                            @foreach($recent_service as $recent)
                            <li class="list-group-item bg-transparent border-0">
                                <a href="{{url('service/'.$recent->slug)}}" class="hn-txt-darkPurple">{{$recent->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </main>

    </section>
@endsection

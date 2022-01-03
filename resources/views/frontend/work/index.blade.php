@extends('layouts.frontend')
@section('main-content')
    <h1 class="my-5 fw-bold border-bottom w-50 m-auto text-center">
        Our Works
    </h1>

    <div id="worksFilter" class="container text-center my-4">
        <a href="{{url('works')}}" class="btn hn-btn-darkPurple">
            All
        </a>
        @foreach($services as $key=>$servi)
            <a href="" @if($key == 0) class="btn hn-btn-darkPurple" @else class="btn hn-btn-darkPurple-outline" @endif>
                {{$servi->title}}
            </a>
        @endforeach

    </div>


    <section class="container">
        <div class="row gx-0 " id="works">

            <!-- Modal -->
            <div>
                <!-- modal 1 -->
                @foreach($ok as $key=>$no)
                <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$no->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center justify-content-evenly">
                                    <figure style="width:200px;height:200px;" class="m-auto">
                                        <img src="{{asset('uploads/gallery/'.$no->image)}}" alt="">
                                    </figure>
                                    <ul class="list-group">
                                        <li class="list-group-item border-0">
                                            <strong>Client Name :</strong>
                                            <div>{{$no->client_title}}</div>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <strong>Location :</strong>
                                            <div>{{$no->location}}</div>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <strong>Service Provided :</strong>
                                            <div>{!! $no->service_provided !!}</div>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn hn-btn-darkPurple" data-bs-dismiss="modal">Close</button> -->

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @foreach($ok as $key=>$woo)
            <div class="col-md-3 col-6  p-0 position-relative hn-display-hover ">

                <figure class="m-0" >
                    <img src="{{asset('uploads/gallery/'.$woo->image)}}" alt="">
                </figure>


                <div class="overlay animate__animated animate__fadeIn position-absolute top-50 start-50 translate-middle h-100 w-100 text-center">
                    <div class="m-auto">
                        <h4 class="text-light">
                            {{$woo->title}}
                        </h4>
                        <br>
                        <button type="button" class="btn hn-btn-darkPurple" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key}}">
                            Launch
                        </button>
                    </div>

                </div>
            </div>
            @endforeach
        </div>


    </section>
    <!-- END OUR WORKS -->

@endsection

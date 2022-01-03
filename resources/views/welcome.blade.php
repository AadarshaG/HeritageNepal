@extends('layouts.frontend')
@section('main-content')
    <!-- HERO -->
    @if(!empty($banner))
    <section class="hero position-relative" style="height: 500px;">
        <div id='heroBanner' class="" >
            @foreach($banner as $ban)
            <figure class="" style="height: 500px;">
                <img src="{{asset('uploads/banner/'.$ban->image)}}" alt="">
            </figure>
            @endforeach
        </div>
        <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 bg-secondary opacity-25"></div>

        <div class="fw-bold text-capitalize position-absolute text-light text-center top-50 start-50 translate-middle">
            <h1 >trust in quality service</h1>
            <h4>commited to complete the client's need</h4>
            <br>
            <a href="" class="btn hn-btn-darkPurple">Know More</a>
        </div>

    </section>
    @endif
    <!-- END OF HERO -->

    <!-- ABOUT -->
    @if(!empty($about))
    <section id="about" class="hn-bg-light p-4">
        <main class="container ">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <h3 class="hn-title">{!! $about->title !!}</h3>

                    <p class="ps-4 py-2">{{ \Illuminate\Support\Str::limit($about->description,300) }}</p>
                    <button class="btn m-auto hn-btn-darkPurple">Download</button>
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
    <!-- END ABOUT -->

    <!-- OUR WORKS -->
    @if(!empty($gallery))
    <section class="position-relative">
        <div class="row gx-0">
            @foreach($gallery as $gall)
            <div class="col-md-3 col-6  p-0 position-relative hn-display-hover">
                <figure class="m-0" >
                    <img src="{{asset('uploads/gallery/'.$gall->image)}}" alt="">
                </figure>


                <div class="overlay animate__animated animate__fadeIn position-absolute top-50 start-50 translate-middle h-100 w-100 text-center">
                    <h4 class=" m-auto">
                        <a href="" class="text-light">{{$gall->title}}</a>
                    </h4>

                </div>
            </div>
            @endforeach
        </div>
        <a href="" class="btn hn-bg-grey position-absolute transform90 top-50 start-0 text-light border">Our Works</a>

    </section>
    @endif
    <!-- END OUR WORKS -->

    <!-- SERVICES-->
    @if(!empty($services))
    <section class="hn-bg-light p-4">
        <main class="container ">
            <h3 class="hn-title pt-5 w-50">What We Serve</h3>

            <div class="row mx-lg-5">
                @foreach($services as $key=>$serv)
                <div class="col-lg-3 col-md-4 col-12 my-4">
                    <div class="bg-white ">
                        <a href="{{url('service/'.$serv->slug)}}">
                        <div class="d-flex align-items-center ">
                            <span class="fs-3 hn-bg-grey py-1 px-4 text-white">{{++$key}}</span>
                            <h5 class="m-auto">{{$serv->title}}</h5>
                        </div>
                        </a>
                        <div class="position-relative service-img">
                            <figure class="px-3 animate__animated animate__fadeIn">
                                <img src="{{asset('uploads/service/'.$serv->image)}}" alt="">
                            </figure>
                            <div class="position-absolute start-0 top-0 bottom-0 end-0 bg-secondary text-white opacity-50 animate__animated animate__fadeIn">
                                <p class="p-3">{{ \Illuminate\Support\Str::limit($serv->description,150) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>

    </section>
    @endif
    <!-- ENDSERVICES -->

    <!-- WHY CHOOSE US -->
    <section class="bg-white p-5">
        <div class="row">
            <div class="col-lg-3 col-md-5 m-auto text-center">
                @if(!empty($brochure))
                <figure class="size-100 m-auto">
                    <img src="{{asset('uploads/brochure/'.$brochure->image)}}" alt="">
                </figure>
                @endif
                <h4 class="mt-4">{{$brochure->title}}</h4>
            </div>
            <div class="col-lg-3 col-md-5 m-auto hn-bg-light p-4">
                <div class="hn-title fs-4">
                    Why Choose Us?
                </div>
                @if(!empty($chooses))
                <div class="py-4">
                    @foreach($chooses as $choose)
                    <div class="d-flex align-items-center justify-content-evenly">
                        <figure class="size-50px">
                            <img src="{{asset('uploads/choose/'.$choose->image)}}" alt="">
                        </figure>
                        <h5>{{$choose->title}}</h5>
                    </div>
                   @endforeach
                </div>
                    @endif
            </div>
        </div>

    </section>
    <!-- END -->

    <!-- VIDEO GALLERY -->
    @if(!empty($videos))
    <section class="position-relative my-5">
        <!-- Modal -->
        <div>
            <!-- modal 1 -->
            @foreach($videos as $key=>$vidd)
            <div class="modal fade" id="{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{$vidd->title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <video autoplay class="object-cover" muted controls>
                                <source src="{{asset('uploads/video/'.$vidd->image)}}">
                                Your browser does not support the video tag.
                            </video>

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row gx-0">
            @foreach($videos as $key=>$vid)
            <div class="col-lg-3 col-md-3 col-6  p-0 position-relative hn-display-hover">
                <video autoplay class="object-cover" muted>
                    <source src="{{asset('uploads/video/'.$vid->image)}}">
                    Your browser does not support the video tag.
                </video>

                <div class="overlay animate__animated animate__fadeIn position-absolute top-50 start-50 translate-middle h-100 w-100 text-center">
                    <div class="m-auto">
                        <h4 class="text-light">
                            {{$vid->title}}
                        </h4>
                        <br>
                        <button type="button" class="btn hn-btn-darkPurple" data-bs-toggle="modal" data-bs-target="#{{$key}}">
                            Launch
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="btn hn-bg-grey position-absolute transform90 top-50 end-0 text-light border">Video Gallery</button>

    </section>
    @endif
    <!-- END -->

    <!-- BLOGS-->
    @if(!empty($blogs))
    <section class="hn-bg-light p-4">
        <main class="container ">
            <h3 class="hn-title pt-5 w-50">Blogs</h3>

            <div class="row mx-lg-5">
                @foreach($blogs as $blog)
                <div class="col-lg-3 col-md-4 col-12 my-4">
                    <div class="bg-white ">
                        <figure style="height: 200px;">
                            <img class="rounded-top object-cover" src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
                        </figure>
                        <h6 class="p-3">
                            <a href="" class="hn-txt-darkPurple">{{ \Illuminate\Support\Str::limit($blog->description,100) }}</a>
                        </h6>
                    </div>
                </div>
                @endforeach

                <a href="{{url('blogs')}}" class="hn-txt-darkPurple">Read All..</a>

            </div>


        </main>

    </section>
    @endif
    <!-- END -->

    <!-- Clients SAY-->
    @if(!empty($testimonial))
    <section class="bg-white p-4">
        <main class="container ">
            <h3 class="hn-title pt-5 w-50">Clients Say</h3>

            <div class="hn-bg-light col-lg-6 col-md-8 mx-auto p-lg-5 p-md-3 p-3 position-relative">
                <span class="d-none d-md-block position-absolute top-0 end-0 pe-5  fs-1"><i class="fi-xtsuxl-quote-solid"></i></span>

                <div id="testimonial" class="testimonial">
                    @foreach($testimonial as $test)
                    <div>
                        <h5 class="fw-bold">{{$test->title}}</h5>
                        <p>{{ \Illuminate\Support\Str::limit($test->description,250) }}</p>
                    </div>
                        @endforeach

                </div>
            </div>

{{--            <div class="fw-bold text-center fs-4 py-5">--}}
{{--                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem ex, in illum officia alias provident corrupti amet unde quas modi.--}}
{{--            </div>--}}
        </main>
    </section>
    @endif
    <!-- END -->
@endsection

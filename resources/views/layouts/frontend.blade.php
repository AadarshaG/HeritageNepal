<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(!empty($logo))
    <link rel="icon" href="{{asset('uploads/logo/'.$logo->image)}}">
    @endif
    <title>Heritage Nepal</title>
    <!-- BOOTSRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- SLICK JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- ANIMATE STYLE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- FRICONIC -->
    <script defer src="https://friconix.com/cdn/friconix.js"> </script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style/css/style.css')}}">
</head>
<body>


<header class="">
    @php
        $logo = DB::table('logos')->select('*')->first();
    @endphp
    @if(!empty($logo))
    <a href="{{url('/')}}">
        <figure class="text-center mt-1 logo-main mx-auto size-100">
            <img src="{{asset('uploads/logo/'.$logo->image)}}" alt="" class="" height="80px">
        </figure>
    </a>
    @endif
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light hn-bg-darkPurple ">
        <div class="container">
            @if(!empty($logo))
            <a class="navbar-brand text-light" href="{{url('/')}}">
                <img src="" alt="" height="20px">
            </a>
            @endif
            <button class="navbar-toggler text-light border border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fi-xnluxl-three-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about-us')}}">about</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{url('services')}}" >
                            Services
                        </a>
                        @php
                            $services = DB::table('services')->select('*')->get();
                        @endphp
                        @if(!empty($services))
                        <ul class="dropdown-menu hn-bg-darkPurple border-light">
                            @foreach($services as $ser)
                            <li class="border border-0" >
                                <a class="dropdown-item" href="{{url('service/'.$ser->slug)}}">{{$ser->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('works')}}">work</a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{url('all-product/view')}}" >
                            Products
                        </a>
                        @php
                            $category = DB::table('categories')->select('*')->orderBy('category_name','asc')->get();
                        @endphp
                        @if(!empty($category))
                        <ul class="dropdown-menu hn-bg-darkPurple border-light">
                            @foreach($category as $cate)
                            <li class="border border-0" >
                                <a class="dropdown-item" href="{{url('category/'.$cate->slug)}}">{{$cate->category_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact-us')}}">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('blogs')}}">blog</a>
                    </li>

                </ul>
                <div class="d-flex">
                    @php
                        $brochures = DB::table('brochures')->select('*')->first();
                     @endphp
                    <a href="{{url('brochurePdf/'.$brochures->id)}}" target="_blank">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="fi-xtluxl-download-thin"></i>
                            Brochure
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->
</header>

@yield('main-content')

<footer class="hn-bg-light">
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-3 col-md-6 p-2  col-12">
                <div class="footer-title fs-4">
                    Quick Links
                </div>
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <a href="{{url('services')}}" class="hn-txt-darkPurple">Services</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <a href="{{url('all-product/view')}}" class="hn-txt-darkPurple">Products</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1">
                        <a href="{{url('contact-us')}}" class="hn-txt-darkPurple">Contact</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1">
                        <a href="{{url('blogs')}}" class="hn-txt-darkPurple">Blogs</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1">
                        <a href="{{url('privacy-policy')}}" class="hn-txt-darkPurple">Privacy Policy</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1">
                        <a href="{{url('terms-&-conditions')}}" class="hn-txt-darkPurple">Terms & Conditions</a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-3 col-md-6 p-2  col-12">
                <div class="footer-title fs-4">
                    Services
                </div>
                @php
                    $servicesss = DB::table('services')->select('*')->get();
                @endphp
                @if(!empty($servicesss))
                <ul class="list-group">
                    @foreach($servicesss as $servicess)
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <a href="{{url('service/'.$servicess->slug)}}" class="hn-txt-darkPurple">{{$servicess->title}}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 p-2  col-12">
                <div class="footer-title fs-4">
                    Contact
                </div>
                @php
                    $info = DB::table('infos')->select('*')->first();
                @endphp
                @if(!empty($info))
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <i class="fi-xnluxl-map-marker"></i>
                        <a href="" class="hn-txt-darkPurple">
                            {{$info->address}}
                        </a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <i class="fi-xnlrxl-phone"></i>
                        <a href="" class="hn-txt-darkPurple">
                            977 - {{$info->phone}} </a>

                    </li>
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <i class="fi-xnluxl-envelope"></i>
                        <a href="" class="hn-txt-darkPurple">
                            {{$info->mail}} </a>

                    </li>

                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <i class="fi-xnluxl-globe"></i>
                        <a href="" class="hn-txt-darkPurple">
                            www.heritagenepal.com</a>
                    </li>

                </ul>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 p-2  col-12">
                <div class="footer-title fs-4">
                    Social
                </div>
                @php
                    $socials = DB::table('socials')->select('*')->get();
                @endphp
                @if(!empty($socials))
                <ul class="list-group">
                    @foreach($socials as $social)
                    <li class="list-group-item border-0 bg-transparent py-1 ">
                        <span><img src="{{asset('uploads/social/'.$social->icon)}}" class="size-25" alt=""></span>
                        <a href="{{$social->link}}" class="hn-txt-darkPurple" target="_blank">{{$social->title}}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="border-top py-2 d-flex justify-content-between align-items-center">
            <div>© {{date('Y')}} Heritage Nepal</div>
            <div>
                <a href="https://www.itarrow.com/" class="text-secondary d-none d-md-block">Developed by IT Arrow</a>
            </div>
        </div>
    </div>


</footer>





<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<!-- SLICK JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- ISOTOPE -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>


<!--CUSTOM JS  -->
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>

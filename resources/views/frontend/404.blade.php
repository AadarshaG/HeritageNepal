@extends('layouts.frontend')
@section('main-content')
    <section class="container d-flex" style="height: 100vh;">
        <div class="m-auto d-flex justify-content-evenly" >
            <figure class="m-auto" style="height: 30vh;">
                <img src="{{asset('frontend/img/404.png')}}" alt="">
            </figure>
            <div class="hn-txt-darkPurple m-auto">
                <h1 class='fw-bold'>Error 404</h1>
                <h4>Page Not Found</h4>
            </div>
        </div>
    </section>
@endsection

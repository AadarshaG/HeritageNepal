@extends('layouts.frontend')
@section('main-content')
    <h1 class="my-4 fw-bold border-bottom w-50 m-auto text-center">
        Blogs
    </h1>

    @if(!empty($blogs))
    <section class=" p-2">
        <main class="container ">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-3 col-md-4 col-12 my-1">
                    <div class="hn-bg-light ">
                        <figure style="height: 200px;">
                            <img class="rounded-top object-cover" src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
                        </figure>
                        <h6 class="p-3">
                            <a href="{{url('blog/'.$blog->slug)}}" class="hn-txt-darkPurple">{!! \Illuminate\Support\Str::limit($blog->description,100) !!}</a>
                        </h6>


                    </div>
                </div>
                @endforeach
            </div>
        </main>

    </section>
    @endif
@endsection

@extends('layouts.frontend')
@section('main-content')

    <div class="w-50 m-auto">
        <h1 class="mb-2 mt-5 fw-bold border-bottom ">
            {{$blog->title}}
        </h1>
        <span>- {{$blog->author}}, &ensp;&ensp;{{\Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}}</span>
    </div>

    <section class=" p-2">
        <main class="container ">
            <div class="row">
                <div class="col-md-8 p-4">
                    <article>
                        <figure style="height: 300px;">
                            <img src="{{asset('uploads/blog/'.$blog->image)}}" class="object-cover" alt="">
                        </figure>

                        <p class="p-2 p-md-4">
                            {!! $blog->description !!}
                        </p>
                    </article>
                </div>
                <div class="col-md-4 hn-bg-light p-4">
                    <h4 class="border-bottom">Recommended</h4>
                    @if(!empty($recent_blog))
                    <ul class="list-group list-group-flush">
                        @foreach($recent_blog as $recent)
                        <li class="list-group-item bg-transparent border-0">
                            <a href="{{url('blog/'.$recent->slug)}}" class="hn-txt-darkPurple">{{$recent->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                        @endif
                </div>
            </div>
        </main>
    </section>

@endsection

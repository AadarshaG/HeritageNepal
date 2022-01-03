@extends('layouts.frontend')
@section('main-content')
    <h1 class="my-5 fw-bold border-bottom w-50 m-auto text-center">
        Contact
    </h1>

    <section class="container">
        @include('flashMsg.flashmessages')
        <div class="row ">
            <div class="col-md-4 m-auto me-1">
                <ul class="list-group">
                    <li class="list-group-item border-0 m-auto m-md-0 bg-transparent py-1 ">
                        <i class="fi-xnluxl-map-marker"></i>
                        <a href="" class="hn-txt-darkPurple">
                            {{$info->address}}
                        </a>
                    </li>
                    <li class="list-group-item border-0 m-auto m-md-0 bg-transparent py-1 ">
                        <i class="fi-xnlrxl-phone"></i>
                        <a href="" class="hn-txt-darkPurple">
                            +977 -{{$info->phone}}
                        </a>
                    </li>
                    <li class="list-group-item border-0 m-auto m-md-0 bg-transparent py-1 ">
                        <i class="fi-xnluxl-envelope"></i>
                        <a href="" class="hn-txt-darkPurple">
                            {{$info->mail}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 mt-2 m-md-auto ms-1">
                <form action="{{url('sendmail')}}" method="post">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="sender_name" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="sender_email" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="subject" id="exampleInputPassword1" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Message</label>
                        <textarea type="number" class="form-control" name="message" id="exampleInputPassword1" required></textarea>
                    </div>

                    <button type="submit" class="btn hn-btn-darkPurple">Send</button>
                </form>
            </div>

            <div class="col-md-8 mt-4 m-auto">
                <iframe src="{!! $info->iframe !!}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
    </section>
@endsection

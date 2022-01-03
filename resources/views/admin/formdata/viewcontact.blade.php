@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                     Message Details
                </h3>
            </div>
            <div class="box-body">
                <ul class="list-group">
                        <li class="list-group-item">
                            Name : {{ $contact->sender_name }}
                        </li>
                        <li class="list-group-item">
                            Email : {{ $contact->sender_email }}
                        </li>
                        <li class="list-group-item">
                            Subject : {{ $contact->subject }}
                        </li>
                        <li class="list-group-item">
                            Message : {{ $contact->message }}
                        </li>
                       
                <ul>
            </div>
        </div>
    </div>
@endsection
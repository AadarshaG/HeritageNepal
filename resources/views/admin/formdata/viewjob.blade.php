@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                     Job Application Details
                </h3>
            </div>
            <div class="box-body">
                <ul class="list-group">
                        <li class="list-group-item">
                            Name : {{ $job->applicants_name }}
                        </li>
                        <li class="list-group-item">
                            Email : {{ $job->applicants_email }}
                        </li>
                        <li class="list-group-item">
                            Address : {{ $job->applicants_address }}
                        </li>
                        <li class="list-group-item">
                            Gender : {{ $job->gender }}
                        </li>
                        <li class="list-group-item">
                            Contact : {{ $job->phone_number }}
                        </li>
                        <li class="list-group-item">
                            Applied For : {{ $job->applied_post }}
                        </li>
                        <li class="list-group-item">
                            Experience : {{ $job->experience }}
                        </li>
                        <li class="list-group-item">
                            Message : {{ $job->message }}
                        </li>
                        <li class="list-group-item">
                            Applied Date : {{ $job->created_at->format('m/d/y') }} <br>{{$job->created_at->diffForHUmans()}}
                        </li>

                       
                <ul>
            </div>
        </div>
    </div>
@endsection
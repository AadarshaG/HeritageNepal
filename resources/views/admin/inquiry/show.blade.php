@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Inquiry Details
                        <div class="pull-right">
                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    <ul class="list-group col-md-12">
                        <li class="list-group-item">
                            <strong>Service Name</strong> : {{ $inquiry->service_name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Name</strong> : {{ $inquiry->full_name }}
                        </li>

                        <li class="list-group-item">
                            <strong>Phone No.</strong> : {{ $inquiry->phone }}
                        </li>
                        <li class="list-group-item">
                            <strong>Message</strong> : {!! $inquiry->message !!}
                        </li>

                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $inquiry->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $inquiry->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
@endsection

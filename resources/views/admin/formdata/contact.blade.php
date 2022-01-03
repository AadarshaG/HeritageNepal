@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Messages from Contact Us Form
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Sender's Name</th>
                        <th>Email</th>
                        <th>subject</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($contacts  as $contact)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$contact->sender_name}}</td>
                            <td>{{$contact->sender_email}}</td>
                            <td>{{$contact->subject}}</td>                       
                            <td>
                                <a href="{{url('form/view', $contact->id)}}" class="btn btn-info btn-sm" title="View Message "><i class=" fa fa-eye"></i></a>

                                <a href="{{url('form/deletemsg', $contact->id)}}" class="btn btn-danger btn-sm" title="Delete Message "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                     End Users
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created_at</th>
                        <th>Is Approved</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($endusers as $user)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                @if($user->is_approved('true'))
                                 Yes
                                 <a href="{{url('endusers/disapprove-user', $user->id)}}" class="btn btn-danger btn-sm">Disapprove</a>
                                
                                @else
                                 No
                                 <a href="{{url('endusers/approve-user', $user->id)}}" class="btn btn-success btn-sm">Approve Now</a>
                                
                                @endif
                            </td>
                            <td>
                                <a href="{{url('endusers/delete', $user->id)}}" class="btn btn-danger btn-sm" title="Delete User "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                     Dealers
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
                        @foreach($dealers as $user)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td>
                                
                                @if($user->is_approved('true'))
                                 Yes
                                 <a href="{{url('dealers/disapprove-dealer', $user->id)}}" class="btn btn-danger btn-sm">Disapprove</a>
                                
                                @else
                                 No
                                 <a href="{{url('dealers/approve-dealer', $user->id)}}" class="btn btn-success btn-sm">Approve Now</a>
                                
                                @endif

                            </td>
                            <td>
                                <a href="{{url('dealers/view-details', $user->id)}}" class="btn btn-info btn-sm" title="View User Details">
                                 <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{url('dealers/delete', $user->id)}}" class="btn btn-danger btn-sm" title="Delete User "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
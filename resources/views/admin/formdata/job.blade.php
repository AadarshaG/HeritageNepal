@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Job Application Lists
                </h3>
            </div>
            <div class="box-body">
                <table class="table table-hover" id="myTable">
                    <thead>
                        <th>S.No</th>
                        <th>Applicant's Name</th>
                        <th>Email</th>
                        <th>Applied Position</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 0;?>
                        @foreach($jobs  as $job)
                        <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$job->applicants_name}}</td>
                            <td>{{$job->applicants_name}}</td>
                            <td>{{$job->applied_post}}</td>                       
                            <td>
                                <a href="{{url('form/viewjobs', $job->id)}}" class="btn btn-info btn-sm" title="View Message "><i class=" fa fa-eye"></i></a>

                                <a href="{{url('form/deletejob', $job->id)}}" class="btn btn-danger btn-sm" title="Delete Message "><i class=" fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.backend')
@section('admin-content')
  <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-3 col-xs-3 col-lg-3">
              <!-- small box -->
              <div class="small-box bg-aqua ">
                <div class="inner">
                  <h3>{{$pending_orders->count()}}</h3>
                  <p>Pending Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{url('orders/pending')}}" class="small-box-footer ">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class=" col-md-3 col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green " >
                <div class="inner">
                  <h3>{{$total_products->count()}}</h3>
                  <p>Total Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{url('admin-product/view')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-md-3 col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$total_user->count()}}</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('endusers/view')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
             <div class=" col-md-3 col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green ">
                <div class="inner">
                  <h3>{{$total_orders->count()}}</h3>
                  <p>Total Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('orders/all')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class=" col-md-3 col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow ">
                <div class="inner">
                  <h3>{{$contact_message->count()}}</h3>
                  <p>Messages</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('form/contact')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class=" col-md-3 col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-blue-gradient ">
                <div class="inner">
                  <h3>{{$inquiry->count()}}</h3>
                  <p>Inquiry Message</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{url('inquiry/view')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
        </section>
      </div>
@endsection

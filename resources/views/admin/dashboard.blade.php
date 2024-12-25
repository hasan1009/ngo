 @extends('layouts.app')
 @section('content')
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-12">
                         <h1 class="m-0">Dashboard</h1>
                     </div><!-- /.col -->

                 </div>
             </div>
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
             <div class="container-fluid">
                 <!-- Small boxes (Stat box) -->
                 <div class="row">
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-info">
                             <div class="inner">
                                 <h3>{{ $totalCollection }} <sup style="font-size: 20px">BDT</sup></h3>

                                 <p>Today's Collections</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-bag"></i>
                             </div>
                             <a href="{{ url('admin/transactions/list') }}" class="small-box-footer">More info <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-success">
                             <div class="inner">
                                 <h3>{{ $totalDistribution }} <sup style="font-size: 20px">BDT</sup></h3>

                                 <p>Today's Distributions </p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-stats-bars"></i>
                             </div>
                             <a href="{{ url('admin/transactions/list') }}" class="small-box-footer">More info <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-warning">
                             <div class="inner">
                                 <h3>{{ $totalAdmin }}</h3>

                                 <p>Total Admins</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-person-add"></i>
                             </div>
                             <a href="{{ url('admin/admin/list') }}" class="small-box-footer">More info <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-danger">
                             <div class="inner">
                                 <h3>{{ $totalEmployee }}</h3>

                                 <p>Total Employee</p>
                             </div>
                             <div class="icon">
                                 <i class="ion ion-pie-graph"></i>
                             </div>
                             <a href="{{ url('admin/employee/list') }}" class="small-box-footer">More info <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-primary">
                             <div class="inner">
                                 <h3>{{ $totalCustomer }}</h3>

                                 <p>Total Customer</p>
                             </div>
                             <div class="icon">
                                 <i class="fa fa-users"></i>
                             </div>
                             <a href="{{ url('admin/customer/list') }}" class="small-box-footer">More info <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-info">
                             @php
                                 $user = auth()->user();
                             @endphp
                             <div class="inner">
                                 <h3>{{ $user->sms_balance }}</h3>

                                 <p>SMS Balance</p>
                             </div>
                             <div class="icon">
                                 <i class="fas fa-envelope"></i>
                             </div>

                             <a href="{{ url('admin/customer/list') }}" class="small-box-footer">Send SMS <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>

                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <div class="small-box bg-secondary">
                             @php
                                 $user = auth()->user();
                             @endphp
                             <div class="inner">
                                 <h3>{{ $user->customer_balance }}</h3>

                                 <p>Customer Adding Balance</p>
                             </div>
                             <div class="icon">
                                 <i class="fas fa-wallet"></i>
                             </div>

                             <a href="{{ url('admin/package/package') }}" class="small-box-footer">Buy Package <i
                                     class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>

                 </div>

             </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
     </div>
 @endsection

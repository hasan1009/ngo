@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Customers List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/customer/add') }}" class="btn btn-primary">+ Add New Customer</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Search Customer</h3>
                                    </div>

                                    <form method="get" action="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ Request::get('name') }}" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile"
                                                        value="{{ Request::get('mobile') }}" placeholder="Mobile Number">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Customer Id</label>
                                                    <input type="number" class="form-control" name="id"
                                                        value="{{ Request::get('id') }}" placeholder="Customer Id">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button class="btm btn-primary" type="submit"
                                                        style="margin-top:35px;">Search</button>

                                                    <a href="{{ url('admin/insurance/customer') }}" class="btm btn-success"
                                                        type="submit" style="margin-top:35px; padding: 4px 15px;">Clear</a>
                                                </div>
                                            </div>

                                        </div>

                                    </form>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        @include('_message')
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Customer List</h3>
                                            </div>
                                            <!-- /.card-header -->

                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer ID</th>
                                                            <th>Profile Photo</th>
                                                            <th>Customer Name</th>
                                                            <th>Mobile Number</th>
                                                            <th>Add Insurance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($getRecord as $value)
                                                            <tr>
                                                                <td>{{ $value->id }}</td>
                                                                @if (!empty($value->photo))
                                                                    <td><img src="{{ asset('upload/customer/' . $value->photo) }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td>
                                                                @else()
                                                                    <td><img src="{{ asset('upload/placeholder.jpg') }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td>
                                                                @endif()
                                                                <td>{{ $value->name }}</td>
                                                                <td>{{ $value->mobile }}</td>

                                                                <td>
                                                                    <a href="{{ url('admin/insurance/add/' . $value->id) }}"
                                                                        class="btn btn-danger">
                                                                        +Add Insurance
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                                <div style="padding: 10px; float:right;">
                                                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </section>
    </div>
@endsection

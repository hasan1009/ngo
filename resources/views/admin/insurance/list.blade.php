@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Insurance List (Total : {{ $getRecord->total() }})</h1>
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
                                        <h3 class="card-title">Search Insurance</h3>
                                    </div>

                                    <form method="get" action="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Customer Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ Request::get('name') }}" placeholder="Customer Name">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Customer Id</label>
                                                    <input type="number" class="form-control" name="customerID"
                                                        value="{{ Request::get('customerID') }}" placeholder="Customer Id">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Customer Mobile</label>
                                                    <input type="number" class="form-control" name="mobile"
                                                        value="{{ Request::get('mobile') }}" placeholder="Customer Mobile">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <button class="btm btn-primary" type="submit"
                                                        style="margin-top:35px;">Search</button>

                                                    <a href="{{ url('admin/insurance/list') }}" class="btm btn-success"
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
                                                <h3 class="card-title">Loan List</h3>
                                                <div class="col-sm-12" style="text-align:right;">
                                                    <a href="{{ url('admin/insurance/customer') }}" class="btn btn-danger">+
                                                        Add
                                                        New Insurance</a>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->

                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Photo</th>
                                                            <th>Name</th>
                                                            <th>Mobile</th>
                                                            <th>Amount</th>
                                                            <th>Action</th>
                                                            {{-- <th>Action</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($getRecord as $value)
                                                            <tr>

                                                                <td>{{ $value->customerID }}</td>
                                                                @if (!empty($value->customer->photo))
                                                                    <td><img src="{{ asset('upload/customer/' . $value->customer->photo) }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td>
                                                                @else()
                                                                    <td><img src="{{ asset('upload/placeholder.jpg') }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td>
                                                                @endif()
                                                                <td>{{ $value->customer->name }}</td>

                                                                <td>{{ $value->customer->mobile }}</td>
                                                                <td>{{ number_format($value->loanAmount, 2) }} BDT</td>
                                                                <td>
                                                                    <a href="{{ url('admin/insurance/details/' . $value->id) }}"
                                                                        class="btn btn-primary">Details</a>
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

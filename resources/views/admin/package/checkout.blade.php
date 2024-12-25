@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Buy Package</h1>
                    </div>

                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Buy Now</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Package Name</th>
                                            <th>Duration</th>
                                            <th>Number of customer</th>
                                            <th>Number of SMS</th>
                                            <th>Package Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $getRecord->name }}</td>
                                            <td>{{ $getRecord->duration }}</td>
                                            <td>{{ $getRecord->customer }}</td>
                                            <td>{{ $getRecord->sms }}</td>
                                            <td>{{ $getRecord->price }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger" style="float: right"><i
                                        class="fas fa-save"></i>
                                    Pay Now</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection

@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Package List</h1>
                    </div>

                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Packages</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>SMS Amount</th>
                                            <th>Rate/SMS</th>
                                            <th>Package Price</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->number }}</td>
                                                <td>{{ $value->rate }}</td>
                                                <td>{{ number_format($value->price, 2) }}</td>

                                                <td>{{ $value->Action }}</td>
                                                <td>

                                                    <a href="{{ url('admin/sms_package/edit_sms/' . $value->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="#"
                                                        onclick="confirmDelete('{{ url('admin/sms_package/delete_sms/' . $value->id) }}')"
                                                        class="btn btn-danger">Delete</a>

                                                </td>
                                                @include('layouts.confirm_delete')
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

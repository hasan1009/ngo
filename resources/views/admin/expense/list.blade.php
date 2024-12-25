@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Expense List
                            (Total : {{ $getRecord->total() }})
                        </h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/expense/add') }}" class="btn btn-primary">+ Add New Expense</a>
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
                                        <h3 class="card-title"><i class="fa fa-window-restore" aria-hidden="true"></i><b>
                                                Search Expense</b></h3>
                                    </div>
                                    <form method="get" action="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>From Date</label>
                                                    <input type="date" class="form-control" name="from_date"
                                                        value="{{ Request::get('from_date') }}" placeholder="Start Date"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>To Date</label>
                                                    <input type="date" class="form-control" name="to_date"
                                                        value="{{ Request::get('to_date') }}" placeholder="End Date"
                                                        required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="margin-top:35px;">Search</button>
                                                    <a href="{{ url('admin/expense/list') }}" class="btn btn-success"
                                                        style="margin-top:35px; padding: 7px 15px;">Clear</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('_message')
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title"><i class="fa fa-table"
                                                                aria-hidden="true"></i> <b>Expense List</b></h3>
                                                        <a href="{{ url('admin/expense/print') }}" class="btn btn-danger"
                                                            style="float: right;">
                                                            <i class="fas fa-print"></i> Print
                                                        </a>
                                                    </div>
                                                    <!-- /.card-header -->

                                                    <div class="card-body p-0">
                                                        <table class="table table-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Expense ID</th>
                                                                    <th>Expense Date</th>
                                                                    <th>Expense Type</th>
                                                                    <th>Expense Amount(BDT)</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($getRecord as $value)
                                                                    <tr>
                                                                        <td>{{ $value->id }}</td>
                                                                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                                                        <td>{{ $value->expenseType }}</td>
                                                                        <td>{{ number_format($value->expenseAmount, 2) }}
                                                                        </td>

                                                                        <td>
                                                                            <a href="{{ url('admin/expense/edit/' . $value->id) }}"
                                                                                class="btn btn-primary">Edit</a>
                                                                            <form
                                                                                action="{{ url('admin/expense/delete/' . $value->id) }}"
                                                                                method="POST"
                                                                                style="display: inline-block;"
                                                                                onsubmit="return confirm('Are you sure you want to delete this expense?');">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                    class="btn btn-danger">Delete</button>
                                                                            </form>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

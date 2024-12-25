@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <a href="{{ url('admin/employee/add') }}" class="btn btn-primary">+ Add New Employee</a>
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
                                        <h3 class="card-title"><i class="fa fa-window-restore" aria-hidden="true"></i>
                                            <b>Search Employees</b>
                                        </h3>
                                    </div>

                                    <form method="get" action="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ Request::get('name') }}" placeholder="Name">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number"
                                                        value="{{ Request::get('mobile_number') }}"
                                                        placeholder="Mobile Number">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Created Date</label>
                                                    <input type="date" class="form-control" name="date"
                                                        value="{{ Request::get('date') }}" placeholder="Created Date">

                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button class="btm btn-primary" type="submit"
                                                        style="margin-top:35px;">Search</button>

                                                    <a href="{{ url('admin/employee/list') }}" class="btm btn-success"
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
                                                <h3 class="card-title"><i class="fa fa-table" aria-hidden="true"></i>
                                                    <b>Employee List</b>
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->

                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Employee ID</th>
                                                            <th>Profile Photo</th>
                                                            <th>Name</th>
                                                            <th>Mobile Number</th>
                                                            <th>Designation</th>
                                                            <th>Created Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($getRecord as $value)
                                                            <tr>
                                                                <td>{{ $value->id }}</td>
                                                                @if (!empty($value->getProfileDirect()))
                                                                    <td><img src="{{ $value->getProfileDirect() }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td>
                                                                    {{-- @else()
                                                                    <td><img src="{{ asset('upload/placeholder.jpg') }}"
                                                                            alt=""
                                                                            style="width:60px; height:60px; border-radius: 50%; border: 2px solid #ddd;">
                                                                    </td> --}}
                                                                @endif()
                                                                <td>{{ $value->name }}</td>
                                                                <td>{{ $value->mobile_number }}</td>
                                                                <td>{{ $value->designation }}</td>
                                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('chat?receiver_id=' . base64_encode($value->id)) }}"
                                                                        class="btn btn-success">Chat</a>
                                                                    <a href="{{ url('admin/employee/edit/' . $value->id) }}"
                                                                        class="btn btn-primary">Edit</a>
                                                                    <a href="#"
                                                                        onclick="confirmDelete('{{ url('admin/employee/delete/' . $value->id) }}')"
                                                                        class="btn btn-danger">Delete</a>



                                                                    @include('layouts.confirm_delete')
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
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

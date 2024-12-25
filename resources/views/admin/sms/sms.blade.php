@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Employee</h1>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="{{ route('sms.send') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control" name="mobile"
                                                value="{{ old('mobile', $getRecord->mobile) }}" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Message (Max: 160)</label>
                                            <textarea class="form-control" name="sms" rows="5" placeholder="Write your message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="float: right">
                                        <i class="fas fa-envelope"></i> SEND
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
        </section>
    </div>
@endsection

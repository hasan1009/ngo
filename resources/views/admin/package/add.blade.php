@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Package</h1>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Package Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required placeholder="Package Name">
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Number of Customer <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="customer"
                                                value="{{ old('customer') }}" required placeholder="Number of Customer">
                                            <div style="color:red">{{ $errors->first('customer') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Duration <span style="color:red;">*</span></label>

                                            <select class="form-control" required name="duration">
                                                <option>Select Duration</option>
                                                <option {{ old('duration') == 'Yearly' ? 'selected' : '' }} value='Yearly'>
                                                    Yearly
                                                </option>
                                                <option {{ old('duration') == 'Half Yearly' ? 'selected' : '' }}
                                                    value='Half Yearly'>
                                                    Half Yearly
                                                </option>
                                                <option {{ old('duration') == 'Monthly' ? 'selected' : '' }}
                                                    value='Monthly'>
                                                    Monthly
                                                </option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Number of SMS <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="sms"
                                                value="{{ old('sms') }}" required placeholder="Number of SMS">
                                            <div style="color:red">{{ $errors->first('sms') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Package Price <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="price"
                                                value="{{ old('price') }}" required placeholder="Package Price">
                                            <div style="color:red">{{ $errors->first('price') }}</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger" style="float: right"><i
                                            class="fas fa-save"></i>
                                        Add Package</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Package</h1>
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
                                            <label>Package Name</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', $getRecord->name) }}" required
                                                placeholder="Package Name">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Number of Customer </label>
                                            <input type="number" class="form-control" required name="customer"
                                                value="{{ old('customer', $getRecord->customer) }}"
                                                placeholder="Number of Customer">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Duration</label>

                                            <select class="form-control" required name="duration">
                                                <option value="" disabled selected>Select Duration</option>
                                                <option
                                                    {{ old('duration', $getRecord->duration) == 'Yearly' ? 'selected' : '' }}
                                                    value="Yearly">Yearly
                                                </option>
                                                <option
                                                    {{ old('duration', $getRecord->duration) == 'Half Yearly' ? 'selected' : '' }}
                                                    value="Half Yearly">Half
                                                    Yearly</option>
                                                <option
                                                    {{ old('duration', $getRecord->duration) == 'Monthly' ? 'selected' : '' }}
                                                    value="Monthly">Monthly
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Number of SMS</label>
                                            <input type="number" class="form-control" name="sms"
                                                value="{{ old('sms', $getRecord->sms) }}" required
                                                placeholder="Number of SMS">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Package Price</label>
                                            <input type="number" class="form-control" name="price"
                                                value="{{ old('price', $getRecord->price) }}" required
                                                placeholder="Package Price">
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger" style="float: right"><i
                                            class="fas fa-save"></i>
                                        Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

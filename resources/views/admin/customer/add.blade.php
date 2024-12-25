@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Customer</h1>
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
                                            <label>Bangla Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="banglaName"
                                                value="{{ old('banglaName') }}" required placeholder="Bangla Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>English Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required placeholder="English Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of birth <span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" name="birthDay"
                                                value="{{ old('birthDay') }}" required placeholder="Date of birth">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Father Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="f_name"
                                                value="{{ old('f_name') }}" required placeholder="Father Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mother Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="m_name"
                                                value="{{ old('m_name') }}" required placeholder="Mother Name">

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="mobile"
                                                value="{{ old('mobile') }}" required placeholder="Mobile Number">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Sex <span style="color:red;">*</span></label>
                                            <select class="form-control" required name="gender">
                                                <option {{ old('gender') == 'Male' ? 'selected' : '' }} value="Male">Male
                                                </option>
                                                <option {{ old('gender') == 'Female' ? 'selected' : '' }} value="Female">
                                                    Female
                                                </option>
                                                <option {{ old('gender') == 'Other' ? 'selected' : '' }} value="Others">
                                                    Others
                                                </option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture</label>
                                            <input type="file" class="form-control" name="photo" id="photo">
                                            <div style="color:red">{{ $errors->first('photo') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>NID Photo</label>
                                            <input type="file" class="form-control" name="nidPhoto" id="nidPhoto">
                                            <div style="color:red">{{ $errors->first('nidPhoto') }}</div>
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label>NID<span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="nid"
                                                value="{{ old('nid') }}" required placeholder="NID">
                                            <div style="color:red">{{ $errors->first('nid') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Present Address <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="preAddress"
                                                value="{{ old('preAddress') }}" required placeholder="Present Address">
                                            <div style="color:red">{{ $errors->first('preAddress') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Permanent Address</label>
                                            <input type="text" class="form-control" name="perAddress"
                                                value="{{ old('perAddress') }}" placeholder="Permanent Address">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Date of joining</label>
                                            <input type="date" class="form-control" name="joiningDate"
                                                value="{{ old('joiningDate') }}" required placeholder="Date of joining">
                                            <div style="color:red">{{ $errors->first('joiningDate') }}</div>
                                        </div>



                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger" style="float: right"><i
                                            class="fas fa-save"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>

    </div>
@endsection

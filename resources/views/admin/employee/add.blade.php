@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Employee</h1>
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
                                            <input type="text" class="form-control" name="bangla_name"
                                                value="{{ old('bangla_name') }}" required placeholder="Bangla Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>English Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required placeholder="English Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of birth <span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ old('dob') }}" required placeholder="Date of birth">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Father Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="father_name"
                                                value="{{ old('father_name') }}" required placeholder="Father Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mother Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="mother_name"
                                                value="{{ old('mother_name') }}" required placeholder="Mother Name">

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
                                            <label>Profile Picture <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control" name="profile_pic" required>
                                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>

                                            @if (!empty($getRecord->profile_pic))
                                                <img src="" alt="">
                                            @endif()

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Designation <span style="color:red;">*</span></label>
                                            <select class="form-control" required name="designation">
                                                <option {{ old('gender') == 'Share Holder' ? 'selected' : '' }}
                                                    value="Share Holder">Share Holder</option>
                                                <option {{ old('gender') == 'Manager' ? 'selected' : '' }} value="Manager">
                                                    Manager</option>
                                                <option {{ old('gender') == 'Field Assistant' ? 'selected' : '' }}
                                                    value="Field Assistant">Field Assistant</option>

                                            </select>
                                            <div style="color:red">{{ $errors->first('designation') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Present Address <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="present_address"
                                                value="{{ old('present_address') }}" required
                                                placeholder="Present Address">
                                            <div style="color:red">{{ $errors->first('present_address') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Permanent Address</label>
                                            <input type="text" class="form-control" name="permanent_address"
                                                value="{{ old('permanent_address') }}" placeholder="Permanent Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of joining</label>
                                            <input type="date" class="form-control" name="date_of_join"
                                                value="{{ old('date_of_join') }}" required placeholder="Date of joining">
                                            <div style="color:red">{{ $errors->first('date_of_join') }}</div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Mobile Number <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="mobile_number" required
                                                placeholder="Mobile Number">
                                            <div style="color:red">{{ $errors->first('mobile_number') }}</div>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Password <span style="color:red;">*</span></label>
                                            <input type="password" class="form-control" name="password"
                                                value="{{ old('password') }}" required placeholder="Password">
                                            <div style="color:red">{{ $errors->first('password') }}</div>
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

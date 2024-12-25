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
                            <form method="post" action="" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Bangla Name</label>
                                            <input type="text" class="form-control" name="bangla_name"
                                                value="{{ old('bangla_name', $getRecord->bangla_name) }}"
                                                placeholder="Bangla Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>English Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', $getRecord->name) }}" placeholder="English Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of birth</label>
                                            <input type="date" class="form-control" name="dob"
                                                value="{{ old('dob', $getRecord->dob) }}" placeholder="Date of birth">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control" name="father_name"
                                                value="{{ old('father_name', $getRecord->father_name) }}"
                                                placeholder="Father Name">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mother Name</label>
                                            <input type="text" class="form-control" name="mother_name"
                                                value="{{ old('mother_name', $getRecord->mother_name) }}"
                                                placeholder="Mother Name">

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Sex</label>
                                            <select class="form-control" name="gender">
                                                <option {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                                    value="Male">Male
                                                </option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Female' ? 'selected' : '' }}
                                                    value="Female">
                                                    Female
                                                </option>
                                                <option {{ old('gender', $getRecord->gender) == 'Other' ? 'selected' : '' }}
                                                    value="Others">
                                                    Others
                                                </option>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture</label>
                                            <input type="file" class="form-control" name="profile_pic">
                                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>

                                            {{-- @if (!empty($getRecord->profile_pic))
                                                <img src="" alt="">
                                            @endif() --}}

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Designation</label>
                                            <select class="form-control" name="designation">
                                                <option
                                                    {{ old('designation', $getRecord->designation) == 'Share Holder' ? 'selected' : '' }}
                                                    value="Share Holder">Share Holder</option>
                                                <option
                                                    {{ old('designation', $getRecord->designation) == 'Manager' ? 'selected' : '' }}
                                                    value="Manager">
                                                    Manager</option>
                                                <option
                                                    {{ old('designation', $getRecord->designation) == 'Field Assistant' ? 'selected' : '' }}
                                                    value="Field Assistant">Field Assistant</option>

                                            </select>
                                            <div style="color:red">{{ $errors->first('designation') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Present Address</label>
                                            <input type="text" class="form-control" name="present_address"
                                                value="{{ old('present_address', $getRecord->present_address) }}"
                                                placeholder="Present Address">
                                            <div style="color:red">{{ $errors->first('present_address') }}</div>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Permanent Address</label>
                                            <input type="text" class="form-control" name="permanent_address"
                                                value="{{ old('permanent_address', $getRecord->permanent_address) }}"
                                                placeholder="Permanent Address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of joining</label>
                                            <input type="date" class="form-control" name="date_of_join"
                                                value="{{ old('date_of_join', $getRecord->date_of_join) }}"
                                                placeholder="Date of joining">
                                            <div style="color:red">{{ $errors->first('date_of_join') }}</div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Mobile Number</label>
                                            <input type="number" class="form-control" name="mobile_number"
                                                value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                                                placeholder="Mobile Number">
                                            <div style="color:red">{{ $errors->first('mobile_number') }}</div>

                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                            <p>***If you want
                                                to change password then add new password***</p>

                                            <div style="color:red">{{ $errors->first('password') }}</div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger" style="float: right"><i
                                            class="fas fa-save"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

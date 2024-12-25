@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin</h1>
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
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $getRecord->name) }}" required placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="number" class="form-control" name="mobile_number"
                                            value="{{ old('mobile_number', $getRecord->mobile_number) }}" required
                                            placeholder="Mobile Number">
                                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture </label>
                                        <input type="file" class="form-control" name="profile_pic" required>
                                        <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Password">
                                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                        <p>***If you want to change password then add new password***</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

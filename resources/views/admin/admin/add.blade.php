@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Admin</h1>
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
                                        <label>Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required placeholder="Name">
                                        <div style="color:red">{{ $errors->first('name') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mobile Number <span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="mobile_number"
                                            value="{{ old('mobile_number') }}" required placeholder="Mobile Number">
                                        <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" name="password" required
                                            placeholder="Password">
                                        <div style="color:red">{{ $errors->first('password') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture <span style="color:red;">*</span></label>
                                        <input type="file" class="form-control" name="profile_pic" required>
                                        <div style="color:red">{{ $errors->first('profile_pic') }}</div>


                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger" style="float: right"><i
                                            class="fas fa-save"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

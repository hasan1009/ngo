@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Setting</h1>
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
                                        <label>Logo </label>
                                        <input type="file" class="form-control" name="logo"
                                            value="{{ old('logo', $getRecord->logo) }}">
                                        <div style="color:red">{{ $errors->first('logo') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <input type="file" class="form-control" name="favicon"
                                            value="{{ old('favicon', $getRecord->favicon) }}">
                                        <div style="color:red">{{ $errors->first('favicon') }}</div>
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

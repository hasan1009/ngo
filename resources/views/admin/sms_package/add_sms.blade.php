@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New SMS Package</h1>
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
                                            <label>SMS Package Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required placeholder="Package Name">
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Number of SMS <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="number"
                                                value="{{ old('number') }}" required placeholder="Number of SMS">
                                            <div style="color:red">{{ $errors->first('number') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Rate/SMS <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="rate"
                                                value="{{ old('rate') }}" required placeholder="Number of SMS"
                                                step="0.01">
                                            <div style="color:red">{{ $errors->first('rate') }}</div>
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

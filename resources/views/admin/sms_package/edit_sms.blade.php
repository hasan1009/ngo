@extends('admin.superadmin.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit SMS Package</h1>
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
                                            <label>SMS Package Name</span></label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', $getRecord->name) }}" required
                                                placeholder="SMS Package Name">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Number of SMS </label>
                                            <input type="number" class="form-control" required name="number"
                                                value="{{ old('number', $getRecord->number) }}" placeholder="Number of SMS">
                                        </div>




                                        <div class="form-group col-md-6">
                                            <label>Rate/SMS</label>
                                            <input type="number" class="form-control" name="rate"
                                                value="{{ old('rate', $getRecord->rate) }}" required placeholder="Rate/SMS"
                                                step="0.01">
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

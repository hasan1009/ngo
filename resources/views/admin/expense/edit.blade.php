@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Expense</h1>
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
                                            <label>Expense Name </label>
                                            <input type="text" class="form-control" name="expenseType"
                                                value="{{ old('expenseType', $getRecord->expenseType) }}"
                                                placeholder="Expense Name">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Expense Amount </label>
                                            <input type="text" class="form-control" name="expenseAmount"
                                                value="{{ old('expenseAmount', $getRecord->expenseAmount) }}"
                                                placeholder="0.0">
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

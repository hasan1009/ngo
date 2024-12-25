@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Loan</h1>
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
                                            <label>Loan Amount <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="payingAmount"
                                                value="{{ old('payingAmount') }}" required placeholder="0.0" step="0.01">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Profit Percent <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="profitPercent"
                                                value="{{ old('profitPercent') }}" required placeholder="%" step="0.01">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Savings <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="diposite"
                                                value="{{ old('diposite') }}" required placeholder="0.0" step="0.01">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Number of Instalments <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="instalmentNumber"
                                                value="{{ old('instalmentNumber') }}" required placeholder="0">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Loan Type <span style="color:red;">*</span></label>
                                            <select class="form-control" required name="meyadType">
                                                <option {{ old('meyadType') == 'Daily' ? 'selected' : '' }} value="Daily">
                                                    Daily
                                                </option>
                                                <option {{ old('meyadType') == 'Weekly' ? 'selected' : '' }} value="Weekly">
                                                    Weekly
                                                </option>
                                                <option {{ old('meyadType') == 'Monthly' ? 'selected' : '' }}
                                                    value="Monthly">
                                                    Monthly
                                                </option>
                                                <option {{ old('meyadType') == 'Yearly' ? 'selected' : '' }} value="Yearly">
                                                    Yearly
                                                </option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Share Start Date <span style="color:red;">*</span></label>
                                            <input type="date" class="form-control" name="startDate"
                                                value="{{ old('startDate') }}" required placeholder="Share Start Date">
                                            <div style="color:red">{{ $errors->first('startDate') }}</div>
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

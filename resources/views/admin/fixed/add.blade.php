@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Fixed Deposite</h1>
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
                                            <label>Fixed Deposite Amount <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="loanAmount"
                                                value="{{ old('loanAmount') }}" required placeholder="0.0" step="0.01">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Profit Percent <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="profitPercent"
                                                value="{{ old('profitPercent') }}" required placeholder="%" step="0.01">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Savings</label>
                                            <input type="number" class="form-control" name="diposite"
                                                value="{{ old('diposite') }}" placeholder="0.0" step="0.01">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration(Day's/Year's) <span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="meyad"
                                                value="{{ old('meyad') }}" required placeholder="0">
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label>Duration Type <span style="color:red;">*</span></label>
                                            <select class="form-control" required name="meyadType">
                                                <option {{ old('meyadType') == 'Months' ? 'selected' : '' }} value="Months">
                                                    Month
                                                </option>
                                                <option {{ old('meyadType') == 'Year' ? 'selected' : '' }} value="Years">
                                                    Year
                                                </option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Fixed Deposite Start Date <span style="color:red;">*</span></label>
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

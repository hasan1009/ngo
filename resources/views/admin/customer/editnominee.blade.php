@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Nominee</h1>
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
                                            <label>Nominee Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="nomineeName"
                                                value="{{ old('nomineeName', $getRecord->nomineeName) }}" required
                                                placeholder="Nominee Name">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nominee's Father Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="nomineeFname"
                                                value="{{ old('nomineeFname', $getRecord->nomineeFname) }}" required
                                                placeholder="Nominee's Father Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nominee's Mother Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="nomineeMname"
                                                value="{{ old('nomineeMname', $getRecord->nomineeMname) }}" required
                                                placeholder="Nominee's Mother Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Relation With Customer<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="nomineeRelation"
                                                value="{{ old('nomineeRelation', $getRecord->nomineeRelation) }}" required
                                                placeholder="Relation With Customer">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nominee's Mobile Number<span style="color:red;">*</span></label>
                                            <input type="number" class="form-control" name="nomineeMobile"
                                                value="{{ old('mobile', $getRecord->nomineeMobile) }}" required
                                                placeholder="Mobile Number">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Nominee's Photo <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control" name="nomineePhoto"
                                                value="{{ old('photo', $getRecord->nomineePhoto) }}">
                                            <div style="color:red">{{ $errors->first('nomineePhoto') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nominee's NID Photo <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control" name="nomineeNidPhoto"
                                                value="{{ old('nomineeNidPhoto', $getRecord->nomineeNidPhoto) }}">
                                            <div style="color:red">{{ $errors->first('nomineeNidPhoto') }}</div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Nominee Gender <span style="color:red;">*</span></label>
                                            <select class="form-control" required name="nomineeGender">
                                                <option
                                                    {{ old('nomineeGender', $getRecord->nomineeGender) == 'Male' ? 'selected' : '' }}
                                                    value="Male">Male</option>
                                                <option
                                                    {{ old('nomineeGender', $getRecord->nomineeGender) == 'Female' ? 'selected' : '' }}
                                                    value="Female">Female</option>
                                                <option
                                                    {{ old('nomineeGender', $getRecord->nomineeGender) == 'Other' ? 'selected' : '' }}
                                                    value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nominee Address<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="nomineeAddress"
                                                value="{{ old('nomineeAddress', $getRecord->nomineeAddress) }}" required
                                                placeholder="Nominee Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="float: right"><i
                                            class="fas fa-save"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
        </section>
    </div>
@endsection

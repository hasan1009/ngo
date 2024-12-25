@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Package List</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <button class="btn btn-primary" onclick="showPackages('yearly')">Yearly</button>
                            <button class="btn btn-secondary" onclick="showPackages('half_yearly')">Half Yearly</button>
                            <button class="btn btn-success" onclick="showPackages('monthly')">Monthly</button>
                        </div>
                        @include('_message')
                        <div class="row" id="packageContainer">
                            @foreach ($getRecord as $value)
                                <div class="col-md-4 package-item" data-duration="{{ strtolower($value->duration) }}">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ $value->name }}</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Duration</th>
                                                        <th>Customer</th>
                                                        <th>SMS</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $value->duration }}</td>
                                                        <td>{{ $value->customer }}</td>
                                                        <td>{{ $value->sms }}</td>
                                                        <td>{{ $value->price }}.00 BDT</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <form method="POST" action="{{ url('admin/package/package/' . $value->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="float: right">
                                                    <i class="fas fa-shopping-cart"></i> Buy Package
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    // Function to display packages based on duration
    function showPackages(duration) {
        const packages = document.querySelectorAll('.package-item');
        packages.forEach(pkg => {
            if (pkg.getAttribute('data-duration') === duration) {
                pkg.style.display = 'block';
            } else {
                pkg.style.display = 'none';
            }
        });
    }

    // Set default display to "Yearly"
    document.addEventListener('DOMContentLoaded', () => {
        showPackages('yearly');
    });
</script>

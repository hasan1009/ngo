@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Employee Report</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <form method="get" action="">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>From Date</label>
                                                <input type="date" class="form-control" name="from_date"
                                                    value="{{ Request::get('from_date') }}" placeholder="Start Date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>To Date</label>
                                                <input type="date" class="form-control" name="to_date"
                                                    value="{{ Request::get('to_date') }}" placeholder="End Date">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary" type="submit"
                                                    style="margin-top:35px;">Search</button>
                                                <a href="{{ url('admin/employee/report') }}" class="btn btn-success"
                                                    style="margin-top:35px; padding: 4px 15px;">Clear</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <button type="button" class="btn btn-danger" style="float: right" onclick="printTable()">
                                    <i class="fas fa-print"></i> Print
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            @php
                                                $cName = '';
                                            @endphp
                                            @php
                                                if (auth()->check()) {
                                                    $cName = auth()->user()->companyName;
                                                } else {
                                                    $cName = 'Guest';
                                                }
                                            @endphp
                                            <th colspan="10"
                                                style="text-align: center; font-size: 24px; font-weight: bold; padding: 15px;">
                                                {{ $cName }}
                                                <br>
                                                <div
                                                    style="font-size: 18px; font-weight: normal; line-height: 1.1; margin-bottom: 5px; margin-top: 10px;">
                                                    <b>Address:</b> মাঝকাজি বাজার, মেহেন্দিগঞ্জ, বরিশাল
                                                </div>
                                                <div
                                                    style="font-size: 18px; font-weight: normal; line-height: 1.1; margin-bottom: 5px;">
                                                    <b>Mobile:</b> 01772282407, <b>E-Mail:</b> fahadhossain2u@gmail.com
                                                </div>
                                            </th>
                                        </tr>

                                        <tr>
                                            {{-- <th>#</th> --}}
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Collection Date</th>
                                            <th>Total Collection</th>
                                            <th>Total Distribution</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $dailyTotal = 0;
                                            $weeklyTotal = 0;
                                            $monthlyTotal = 0;
                                            $yearlyTotal = 0;
                                        @endphp
                                        @foreach ($getRecord as $value)
                                            <tr>

                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->name }}</td>
                                                {{-- <td>{{ date('d-m-Y H:i A', strtotime($value->date)) }}</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>


                                    <tfoot>
                                        <tr>
                                            <th colspan="1" style="text-align: left;">Total</th>
                                            <th>{{ number_format($dailyTotal, 2) }}</th>
                                            <th>{{ number_format($weeklyTotal, 2) }}</th>
                                            <th>{{ number_format($monthlyTotal, 2) }}</th>
                                            <th>{{ number_format($yearlyTotal, 2) }}</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <!-- Signature Space -->
                                <div style="text-align: center; font-size: 18px; margin-top: 20px;">
                                    <div style="float: right; width: 300px;">
                                        <p>_______________________</p>
                                        <p style="font-weight: bold;">Authorized Signature</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JavaScript to handle print functionality -->
    <script>
        function printTable() {
            var printContent = document.getElementById("example1");
            var printWindow = window.open('', '', 'height=600, width=800');

            // Add CSS styles for the print layout
            printWindow.document.write('<html><head><title>Acounts Care</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('body { font-family: Arial, sans-serif; }');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
            printWindow.document.write('th, td { padding: 10px; text-align: center; border: 1px solid #ddd; }');
            printWindow.document.write('th { background-color: #f2f2f2; font-weight: bold; }');
            printWindow.document.write('tfoot th { background-color: #f9f9f9; font-weight: bold; }');
            printWindow.document.write('thead th { font-size: 18px; }');
            printWindow.document.write('tfoot td { font-size: 16px; font-weight: normal; }');
            printWindow.document.write('div.signature { text-align: center; font-size: 18px; margin-top: 20px; }');
            printWindow.document.write('div.signature div { float: right; width: 300px; }');
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContent.outerHTML);

            // Add signature space after the table
            printWindow.document.write('<div class="signature">');
            printWindow.document.write(
                '<div><p>_______________________</p><p style="font-weight: bold;">Authorized Signature</p></div>');
            printWindow.document.write('</div>');

            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
@endsection

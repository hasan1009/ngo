@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Savings Wallet</h3>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        @if (!empty($loan->customer->photo))
                                            <img src="{{ asset('upload/customer/' . $loan->customer->photo) }}"
                                                alt="Customer Photo"
                                                style="width:150px; height:150px; border: 3px solid #e7e7e7; border-radius: 10px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('upload/placeholder.jpg') }}" alt="Placeholder"
                                                style="width:120px; height:120px; border: 2px solid #ddd; border-radius: 50%; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="ms-3">
                                        <h3 class="profile-username"><b>{{ $loan->customer->name }}</b></h3>
                                        <p class="text-muted" style="margin: 0;">{{ $loan->customer->preAddress }}</p>
                                        <p class="text-muted" style="margin: 0;">Mobile: {{ $loan->customer->mobile }}</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3 mb-2">
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#depositModal" style="margin-right: 5px;">
                                        <i class="fas fa-plus-circle" style="font-size: 0.8em;"></i> Deposit
                                    </a>

                                    <a href="#" onclick="" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#withdrawModal">
                                        <i class="fas fa-minus-circle" style="font-size: 0.8em;"></i> Withdraw
                                    </a>
                                </div>
                                <ul class="list-group list-group-unbordered mb-3">
                                    {{-- <li class="list-group-item">
                                        <b>Name(English)</b> <b
                                            class="float-right text-muted">{{ $loan->customer->name }}</b>
                                    </li> --}}
                                    <li class="list-group-item">
                                        <b>Name(Bangla)</b> <b
                                            class="float-right text-muted">{{ $loan->customer->banglaName }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Father Name</b> <b
                                            class="float-right text-muted">{{ $loan->customer->f_name }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mother Name</b> <b
                                            class="float-right text-muted">{{ $loan->customer->m_name }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Account Number</b> <b
                                            class="float-right text-muted">#{{ $loan->customer->id }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile Number</b> <b
                                            class="float-right text-muted">{{ $loan->customer->mobile }}</b>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h3 class="card-title"><i class="fa fa-window-restore" aria-hidden="true"></i>
                                                <b>Saving Details</b></h3>

                                        </div>
                                        <div class="col-sm-6" style="text-align:right;">
                                            <button class="btn btn-sm btn-primary ml-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i class="fas fa-edit" style="font-size: 0.8em;"></i> Edit Savings
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body box-profile">

                                <ul class="list-group list-group-unbordered mb-3">


                                    <li class="list-group-item">
                                        <b>Savings Amount</b> <b
                                            class="float-right text-muted">{{ number_format($loan->loanAmount, 2) }}
                                            BDT</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Duration</b> <b
                                            class="float-right text-muted">{{ $loan->meyad ? $loan->meyad : 0 }}
                                            {{ $loan->meyadType }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Interest</b>
                                        <b class="float-right text-muted">
                                            {{ $loan->profitPercent ? $loan->profitPercent : '0' }} %
                                            <!-- Add Edit Button -->

                                        </b>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Opening Date</b> <b
                                            class="float-right text-muted">{{ date('d-m-Y H:i A', strtotime($loan->created_at)) }}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Has Crossed</b>
                                        <b class="float-right text-muted">
                                            @php
                                                $times =
                                                    $loan->meyadType == 'Months'
                                                        ? (int) \Carbon\Carbon::parse($loan->created_at)->diffInMonths(
                                                            now(),
                                                        )
                                                        : (int) \Carbon\Carbon::parse($loan->created_at)->diffInYears(
                                                            now(),
                                                        );

                                                $unit =
                                                    $loan->meyadType == 'Months'
                                                        ? ($times == 1
                                                            ? 'Month'
                                                            : 'Months')
                                                        : ($times == 1
                                                            ? 'Year'
                                                            : 'Years');
                                            @endphp
                                            {{ $times }} {{ $unit }}
                                        </b>
                                    </li>



                                </ul>
                            </div>

                        </div>

                    </div>

                    {{-- Second Column --}}
                    <div class="col-md-6">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fa fa-window-restore" aria-hidden="true"></i> <b>Saving
                                        Transactions</b></h3>

                            </div>
                            <!-- /.card-header -->

                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Trx Type</th>
                                            <th>Trx Date</th>
                                            <th>Received Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Current Balance</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $runningBalance = 0; // Initialize the running balance
                                        @endphp
                                        @foreach ($loan->transactions as $transaction)
                                            @php
                                                // Adjust the running balance based on the transaction type
                                                if ($transaction->transactionType === 'Savings Deposite') {
                                                    $runningBalance += $transaction->receiveAmount;
                                                } elseif ($transaction->transactionType === 'Withdraw Deposit') {
                                                    $runningBalance -= $transaction->payingAmount;
                                                }
                                            @endphp
                                            <tr>
                                                <td><b>{{ $transaction->transactionType }}</b></td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($transaction->date)) }}
                                                <td>{{ number_format($transaction->receiveAmount, 2) }} BDT</td>
                                                <td>{{ number_format($transaction->payingAmount, 2) }} BDT</td>
                                                <td>{{ number_format($runningBalance, 2) }} BDT</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>


            </div>

            {{-- Deposite Modal --}}


            <div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="depositModalLabel"><b>Deposit Amount</b> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="depositForm" method="post"
                                action="{{ url('admin/savings/deposit/' . $loan->id) }}">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="depositDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="depositDate" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loanAmount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="loanAmount" name="loanAmount"
                                        required placeholder="0.0">
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-secondary me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- @php
                $mainAmount = $loan->loanAmount;
                $interestamt = ($loan->loanAmount * ($loan->profitPercent ?? 0)) / 100;
                $hasPassed = (int) \Carbon\Carbon::parse($loan->created_at)->diffInMonths(now());
                $currentProfits = $interestamt * $hasPassed;
                $receiveAmount = $currentProfits + $mainAmount;
                $totalAmount = $mainAmount + $interestamt;
                $totalLoss = 0;

                if ($loan->meyadType == 'Months') {
                    $totalLoss = $loan->meyad * $interestamt - $currentProfits;
                } elseif ($loan->meyadType == 'Years') {
                    $totalLoss = $loan->meyad * 12 * $interestamt - $currentProfits;
                }

            @endphp --}}

            {{-- Withdraw Modal --}}

            <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="withdrawModalLabel"><b>Withdraw Details</b> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="depositForm" method="post"
                                action="{{ url('admin/savings/withdraw/' . $loan->id) }}">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="depositDate" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="depositDate" name="date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loanAmount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" id="payingAmount" name="payingAmount"
                                        required placeholder="0.0">
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-secondary me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Widthdraw</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Modal --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel"><b>Edit</b> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('admin/savings/update/' . $loan->id) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Profit Percent</label>
                                            <input type="number" class="form-control" name="profitPercent"
                                                value="{{ old('profitPercent', $loan->profitPercent) }}" placeholder="%">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Savings</label>
                                            <input type="number" class="form-control" name="diposite"
                                                value="{{ old('diposite', $loan->diposite) }}" placeholder="0.0">

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Duration(Day's/Year's)</label>
                                            <input type="number" class="form-control" name="meyad"
                                                value="{{ old('meyad', $loan->meyad) }}" placeholder="0">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Duration Type </label>
                                            <select class="form-control" required name="meyadType">
                                                <option
                                                    {{ old('meyadType', $loan->meyadType) == 'Months' ? 'selected' : '' }}
                                                    value="Months">
                                                    Month
                                                </option>
                                                <option
                                                    {{ old('meyadType', $loan->meyadType) == 'Years' ? 'selected' : '' }}
                                                    value="Years">
                                                    Year
                                                </option>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Share Start Date</label>
                                            <input type="date" class="form-control" name="startDate"
                                                value="{{ old('startDate', $loan->startDate) }}"
                                                placeholder="Share Start Date">
                                            <div style="color:red">{{ $errors->first('startDate') }}</div>
                                        </div>


                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-end mt-4">
                                    <button type="button" class="btn btn-secondary me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




        </section>
    </div>
@endsection

<!-- Deposit Modal -->

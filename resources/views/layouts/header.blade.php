<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>


    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        @php
            $allChatUserCount = App\Models\ChatModel::getAllChatUserCount();
        @endphp
        <li class="nav-item">
            <a class="nav-link" href="{{ url('chat') }}">
                <i class="far fa-comments"></i>
                <span
                    class="badge badge-danger navbar-badge">{{ !empty($allChatUserCount) ? $allChatUserCount : '' }}</span>
            </a>

        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="text-align:center">

        <span class="brand-text font-weight-light" style= "font-weight: bold !important; font-size:20px;">

            <div class="image">
                <img src="{{ isset($getHeaderSettings) ? $getHeaderSettings->getLogo() : asset('upload/settings/20241129125821dxnwia3seehdiq4aqgm4.jpeg') }}"
                    class="elevation-2" alt="User Image" style="height: 80px; width:200px">
            </div>



        </span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->getProfileDirect() }}" class="img-circle elevation-2"
                    alt="{{ Auth::user()->name }}">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (Auth::user()->user_type == 1)
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt "></i>
                            <p>Admin Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-address-book"></i>
                            <p>
                                Admins
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/admin/add') }}" class="nav-link">
                                    <i class="fa fa-user-plus nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/admin/list') }}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Admin List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-address-card"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/employee/add') }}" class="nav-link">
                                    <i class="fa fa-user-plus nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/employee/list') }}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>User List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-id-card"></i>
                            <p>
                                Customers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/customer/add') }}" class="nav-link">
                                    <i class="fa fa-user-plus nav-icon"></i>
                                    <p>Add New</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/customer/list') }}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Customers List</p>
                                </a>
                            </li>

                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/customer/laser') }}" class="nav-link">
                                    <i class="fa fa-users nav-icon"></i>
                                    <p>Customer Laser</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-credit-card" aria-hidden="true"></i>

                            <p>
                                Expense
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/expense/add') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Add Expense</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/expense/list') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Expenses List</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">

                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                            <p>
                                Reports
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/transactions/list') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Transaction Report</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/customer/report') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Collection Report</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/expense/list') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Expense Report</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">

                            <i class="fa fa-sticky-note" aria-hidden="true"></i>
                            <p>
                                Package
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/package/package') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>Subscription</p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-left:20px;">
                                <a href="{{ url('admin/package/sms_package') }}" class="nav-link ">
                                    <i class="nav-icon fa fa-calendar "></i>
                                    <p>SMS Package</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url('admin/employee/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt "></i>
                            <p>User Dashboard</p>
                        </a>
                    </li>
                @endif


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                        <p>
                            Accounts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/share/list') }}" class="nav-link">
                                <i class="fa fa-credit-card nav-icon"></i>
                                <p>Share</p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/savings/list') }}" class="nav-link">
                                <i class="fa fa-window-restore nav-icon"></i>
                                <p>Savings</p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/fixed/list') }}" class="nav-link">
                                <i class="fa fa-compass nav-icon"></i>
                                <p>Fixed Deposite</p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/dps/list') }}" class="nav-link">
                                <i class="fa fa-cubes nav-icon"></i>
                                <p>DPS</p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/loan/list') }}" class="nav-link">
                                <i class="fa fa-object-group nav-icon"></i>
                                <p>Loan</p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-left:20px;">
                            <a href="{{ url('admin/insurance/list') }}" class="nav-link">
                                <i class="fa fa-podcast nav-icon"></i>
                                <p>Insurance</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <div class="user-panel">
                    <li class="nav-item">
                        <a href="{{ url('logout') }}" class="nav-link">
                            <i class="fa fa-power-off text-danger nav-icon"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
    </div>
</aside>

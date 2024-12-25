@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Customer Details</h3>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><b><i class="fa fa-window-restore" aria-hidden="true"></i> Customer
                                        Details</b></h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        @if (!empty($getRecord->photo))
                                            <img src="{{ asset('upload/customer/' . $getRecord->photo) }}"
                                                alt="Customer Photo"
                                                style="width:150px; height:150px; border: 3px solid #e7e7e7; border-radius: 10px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('upload/placeholder.jpg') }}" alt="Placeholder"
                                                style="width:120px; height:120px; border: 2px solid #ddd; border-radius: 50%; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="ms-3" style="margin-left: 20px;">
                                        <h3 class="profile-username"><b>{{ $getRecord->name }}</b></h3>
                                        <p class="text-muted" style="margin: 0;">{{ $getRecord->preAddress }}</p>
                                        <p class="text-muted" style="margin: 0;">Mobile: {{ $getRecord->mobile }}</p>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end mt-3 mb-2">
                                    <a href="{{ url('admin/customer/edit/' . $getRecord->id) }}" onclick=""
                                        style="margin-right: 5px;" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#withdrawModal">
                                        <i class="fas fa-pencil-alt mr-1" aria-hidden="true"></i>
                                        Edit
                                    </a>

                                    <a href="#"
                                        onclick="confirmDelete('{{ url('admin/customer/delete/' . $getRecord->id) }}')"
                                        class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                    @include('layouts.confirm_delete')
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-unbordered mb-3" style="margin-top: 20px;">
                                            <li class="list-group-item">
                                                <b>Account Number</b> <b
                                                    class="float-right text-muted">#{{ $getRecord->id }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Name(Bangla)</b> <b
                                                    class="float-right text-muted">{{ $getRecord->banglaName }}</b>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Father Name</b> <b
                                                    class="float-right text-muted">{{ $getRecord->f_name }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mother Name</b> <b
                                                    class="float-right text-muted">{{ $getRecord->m_name }}</b>
                                            </li>

                                            <li class="list-group-item">
                                                <b>Date of Birth</b> <b class="float-right text-muted">
                                                    {{ date('d-m-Y', strtotime($getRecord->birthDay)) }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Gender</b> <b
                                                    class="float-right text-muted">{{ $getRecord->gender }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mobile Number</b> <b
                                                    class="float-right text-muted">{{ $getRecord->mobile }}</b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-unbordered mb-3" style="margin-top: 20px;">
                                            <li class="list-group-item">
                                                <b>Present Address</b> <b
                                                    class="float-right text-muted">{{ $getRecord->preAddress }}</b>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Permenent Address</b> <b
                                                    class="float-right text-muted">{{ $getRecord->perAddress }}</b>
                                            </li>

                                            <li class="list-group-item">
                                                <b>NID Photo</b>
                                                @if (!empty($getRecord->nidPhoto))
                                                    <img src="{{ asset('upload/nid/' . $getRecord->nidPhoto) }}"
                                                        alt="NID Photo"
                                                        style="width:60px; height:60px; border: 2px solid #ddd; cursor: pointer;"
                                                        class="float-right" data-toggle="modal" data-target="#imageModal">
                                                @else
                                                    <img src="{{ asset('upload/placeholder.jpg') }}"
                                                        alt="Placeholder Image"
                                                        style="width:60px; height:60px; border: 2px solid #ddd; cursor: pointer;"
                                                        class="float-right" data-toggle="modal" data-target="#imageModal">
                                                @endif
                                            </li>
                                            <!-- Modal -->
                                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="imageModalLabel">NID Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            @if (!empty($getRecord->nidPhoto))
                                                                <img src="{{ asset('upload/nid/' . $getRecord->nidPhoto) }}"
                                                                    alt="NID Photo" style="max-width:100%; height:auto;">
                                                            @else
                                                                <img src="{{ asset('upload/placeholder.jpg') }}"
                                                                    alt="Placeholder Image"
                                                                    style="max-width:100%; height:auto;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bootstrap CSS -->
                                            <link
                                                href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
                                                rel="stylesheet">

                                            <!-- Bootstrap JS and dependencies -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
                                            <li class="list-group-item">
                                                <b>Joining Date</b> <b class="float-right text-muted">
                                                    {{ date('d-m-Y', strtotime($getRecord->birthDay)) }}</b>
                                            </li>


                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-5">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><b><i class="fa fa-table" aria-hidden="true"></i> Nominee
                                        Details</b></h3>
                            </div>
                            <div class="card-body box-profile">
                                <div class="d-flex align-items-center">
                                    <div class="text-left">
                                        @if (!empty($getRecord->nomineePhoto))
                                            <img src="{{ asset('upload/' . $getRecord->nomineePhoto) }}"
                                                alt="Customer Photo"
                                                style="width:150px; height:150px; border: 3px solid #e7e7e7; border-radius: 10px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('upload/placeholder.jpg') }}" alt="Placeholder"
                                                style="width:120px; height:120px; border: 2px solid #ddd; border-radius: 50%; object-fit: cover;">
                                        @endif
                                    </div>
                                    @if ($getRecord && ($getRecord->nomineeName || $getRecord->nomineeAddress || $getRecord->nomineeMobile))
                                        <div class="ms-3" style="margin-left: 20px;">
                                            <h3 class="profile-username">
                                                <b>{{ $getRecord->nomineeName ?? 'No Name Found' }}</b>
                                            </h3>
                                            <p class="text-muted" style="margin: 0;">
                                                {{ $getRecord->nomineeAddress ?? 'No Address Found' }}</p>
                                            <p class="text-muted" style="margin: 0;">Mobile:
                                                {{ $getRecord->nomineeMobile ?? 'No Mobile Number Found' }}</p>
                                        </div>
                                    @else
                                        <div class="ms-3" style="margin-left: 20px;">
                                            <h3 class="profile-username"><b>No Data Found</b></h3>
                                        </div>
                                    @endif


                                </div>
                                <div class="d-flex justify-content-end mt-3 mb-2">
                                    <a href="{{ url('admin/customer/editnominee/' . $getRecord->id) }}"
                                        class="btn btn-primary">
                                        <i class="fas fa-pencil-alt mr-1" aria-hidden="true"></i> Add/Edit
                                    </a>
                                </div>


                                <ul class="list-group list-group-unbordered mb-3" style="margin-top: 20px;">

                                    <li class="list-group-item">
                                        <b>Nominee Name</b>
                                        @if (!empty($getRecord->nomineeName))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeName }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif


                                    </li>
                                    <li class="list-group-item">
                                        <b>Father Name</b>
                                        @if (!empty($getRecord->nomineeFname))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeFname }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif

                                    </li>
                                    <li class="list-group-item">
                                        <b>Mother Name</b>
                                        @if (!empty($getRecord->nomineeMname))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeMname }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif

                                    </li>

                                    <li class="list-group-item">
                                        <b>Relation</b>
                                        @if (!empty($getRecord->nomineeRelation))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeRelation }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b>
                                        @if (!empty($getRecord->nomineeGender))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeGender }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif

                                    </li>
                                    <li class="list-group-item">
                                        <b>Mobile Number</b>
                                        @if (!empty($getRecord->nomineeMobile))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeMobile }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif

                                    </li>
                                    <li class="list-group-item">
                                        <b>NID Photo</b>
                                        @if (!empty($getRecord->nomineeNidPhoto))
                                            <img src="{{ asset('upload/' . $getRecord->nomineeNidPhoto) }}"
                                                alt="Nomeenee NID Photo"
                                                style="width:60px; height:60px; border: 2px solid #ddd; cursor: pointer;"
                                                class="float-right"
                                                onclick="showModal('{{ asset('upload/' . $getRecord->nomineeNidPhoto) }}', 'Nomeenee NID Photo')">
                                        @else
                                            <img src="{{ asset('upload/placeholder.jpg') }}" alt="Placeholder Image"
                                                style="width:60px; height:60px; border: 2px solid #ddd; cursor: pointer;"
                                                class="float-right"
                                                onclick="showModal('{{ asset('upload/placeholder.jpg') }}', 'Placeholder Image')">
                                        @endif
                                        <div class="modal fade" id="dynamicImageModal" tabindex="-1" role="dialog"
                                            aria-labelledby="dynamicImageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="dynamicImageModalLabel"></h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img id="dynamicModalImage" src="" alt="Modal Image"
                                                            style="max-width:100%; height:auto;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function showModal(imageUrl, title) {
                                                // Update the modal content dynamically
                                                document.getElementById('dynamicModalImage').src = imageUrl; // Set the image
                                                document.getElementById('dynamicImageModalLabel').textContent = title; // Set the title
                                                $('#dynamicImageModal').modal('show'); // Show the modal
                                            }
                                        </script>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nominee Address</b>
                                        @if (!empty($getRecord->nomineeAddress))
                                            <b class="float-right text-muted">{{ $getRecord->nomineeAddress }}</b>
                                        @else
                                            <b class="float-right text-muted">No data found</b>
                                        @endif

                                    </li>
                                    <!-- Modal -->
                                    <!-- Modal -->
                                    <div class="modal fade" id="dynamicImageModal" tabindex="-1" role="dialog"
                                        aria-labelledby="dynamicImageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="dynamicImageModalLabel"></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img id="dynamicModalImage" src="" alt="Modal Image"
                                                        style="max-width:100%; height:auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function showModal(imageUrl, title) {
                                            // Update the modal content dynamically
                                            document.getElementById('dynamicModalImage').src = imageUrl; // Set the image
                                            document.getElementById('dynamicImageModalLabel').textContent = title; // Set the title
                                            $('#dynamicImageModal').modal('show'); // Show the modal
                                        }
                                    </script>



                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
    </div>
    </section>
    </div>
@endsection

<!-- Deposit Modal -->

@extends('layouts/contentLayoutMaster')

@section('title', 'Ticket')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
@endsection

@section('content')
    <!-- users list start -->
    <section class="app-user-list">
        <!-- users filter start -->

        <!-- users filter end -->
        <!-- list section start -->

        <div class="card p-1">
            {{-- <div class="head-label">
                <h6 class="mb-0">County List</h6>
            </div> --}}
            <div class="card-header border-bottom">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="padding: 0.1rem 0.1rem;">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Ticket</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
                <div class="dt-action-buttons text-right">
                    <div class="dt-buttons d-inline-flex">
                        {{-- <button class="dt-button buttons-collection btn btn-outline-secondary dropdown-toggle mr-2"
                            tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-share font-small-4 mr-50">
                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                    <polyline points="16 6 12 2 8 6"></polyline>
                                    <line x1="12" y1="2" x2="12" y2="15"></line>
                                </svg>
                                Export
                            </span>
                        </button> --}}
                        <div class="invoice_status ml-2">
                            <select id="UserRole" class="form-control ml-50 text-capitalize">
                                <option value=""> Select Event </option>
                                <option value="Downloaded" class="text-capitalize">Downloaded</option>
                                <option value="Draft" class="text-capitalize">Draft</option>
                                <option value="Paid" class="text-capitalize">Paid</option>
                                <option value="Partial Payment" class="text-capitalize">Partial Payment</option>
                                <option value="Past Due" class="text-capitalize">Past Due</option>
                                <option value="Sent" class="text-capitalize">Sent</option>
                            </select>
                        </div>
                        <div class="invoice_status ml-2">
                            <select id="UserRole" class="form-control ml-50 text-capitalize">
                                <option value=""> Select SKU </option>
                                <option value="Downloaded" class="text-capitalize">Downloaded</option>
                                <option value="Draft" class="text-capitalize">Draft</option>
                                <option value="Paid" class="text-capitalize">Paid</option>
                                <option value="Partial Payment" class="text-capitalize">Partial Payment</option>
                                <option value="Past Due" class="text-capitalize">Past Due</option>
                                <option value="Sent" class="text-capitalize">Sent</option>
                            </select>
                        </div>
                        <div class="invoice_status ml-2">
                            <select id="UserRole" class="form-control ml-50 text-capitalize">
                                <option value=""> Select Status </option>
                                <option value="Downloaded" class="text-capitalize">Downloaded</option>
                                <option value="Draft" class="text-capitalize">Draft</option>
                                <option value="Paid" class="text-capitalize">Paid</option>
                                <option value="Partial Payment" class="text-capitalize">Partial Payment</option>
                                <option value="Past Due" class="text-capitalize">Past Due</option>
                                <option value="Sent" class="text-capitalize">Sent</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th> S.No.</th>
                            <th> Booking NO.</th>
                            <th> Client</th>
                            <th> Created</th>
                            <th> Total Seat</th>
                            <th> Total Amount</th>
                            <th> Payment Status</th>
                            <th> Actions</th>
                        </tr>
                    </thead>
                    <tbody id="show_table" style="display: none">
                        @if (!empty($results))
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($results as $key => $result)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{route('attendee.info',$result->id)}}">{{ $result->order_id ? $result->order_id : 'FT139783073' . $i++ }}</a>
                                    </td>
                                    <td>{{ $result->booking_fname }}&nbsp{{ $result->booking_lname }}</td>
                                    <td>{{ date('d-m-Y', strtotime($result->created_at)) }}</td>
                                    <td>{{ $result->number_of_seats }}</td>
                                    <td>{{ $result->total_amount }}</td>
                                    <td>
                                        @if ($result->booking_status[$key]['status'] == 'completed')
                                            <div class="badge badge-pill badge-light-success">Completed</div>
                                            <span class="badge rounded-pill bg-success"></span>
                                        @elseif ($result->booking_status[$key]['status'] == 'in-progress')
                                            <div class="badge badge-pill badge-light-warning">In-progress</div>
                                        @else
                                            <div class="badge badge-pill badge-light-danger">Failed</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                                data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-vertical">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0);">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- Modal to add new user starts-->
            <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                <div class="modal-dialog">
                    <form class="add-new-user modal-content pt-0" name="ajax_form" method="post"
                        action="{{ route('county.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                        <div class="modal-header mb-1">
                            <h5 class="modal-title" id="exampleModalLabel">Add County</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">County Name</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                    placeholder="Enter County Name" name="name" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal to add new user Ends-->
        </div>
        <!-- list section end -->
    </section>
    <!-- users list ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap4.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>

@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
    <script src="{{ asset('js/scripts/common/common-action.js') }}"></script>

@endsection

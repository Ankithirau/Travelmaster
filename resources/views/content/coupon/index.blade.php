@extends('layouts/contentLayoutMaster')

@section('title', 'Coupon')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Coupon</a></li>
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
                        <button class="dt-button create-new btn btn-primary" tabindex="0"
                            aria-controls="DataTables_Table_0" type="button" data-toggle="modal"
                            data-target="#modals-slide-in">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Add Coupon
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Coupon Name</th>
                            <th>End Date</th>
                            <th>Discount Type</th>
                            <th>Discount Value</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                    </thead>
                    <tbody id="show_table" style="display: none">
                        @if (!empty($results))
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$result->promo_code}}</td>
                                    <td>{{$result->end_date}}</td>
                                    <td>{{$result->discount_type}}</td>
                                    <td>&#8364; {{$result->value}}</td>
                                    <td>
                                        <div class="custom-control custom-control-success custom-switch">
                                            <input type="checkbox" checked class="custom-control-input status_checks"
                                                id="customSwitch{{ $result->id }}"
                                                data-status_id="{{ $result->id }}" />
                                            <label class="custom-control-label"
                                                for="customSwitch{{ $result->id }}"></label>
                                        </div>
                                        {{-- <span
                                            class="badge badge-pill @if ($result->status == 0) badge-light-warning @else badge-light-success @endif updateStatus mr-1">
                                            @if ($result->status == 0)
                                                Inactive
                                            @else
                                                Active
                                            @endif
                                        </span> --}}
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
                            <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
                        </div>
                        <div class="modal-body flex-grow-1">
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Coupon Code</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                    placeholder="Enter Coupon Code" name="name" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Coupon amount</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                    placeholder="Enter Coupon amount" name="name" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Minimum Cart Amount</label>
                                <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname"
                                    placeholder="Enter Minimum Cart Amount" name="name" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Discount Type</label>
                                <select class="form-control" id="basicSelect">
                                    <option value="" selected>Select Discount Type</option>
                                    <option value="1">Fixed Percentage Discount</option>
                                    <option value="2">Fixed Value Discount</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Start Date</label>
                                <input type="text" id="fp-default" class="form-control flatpickr-basic flatpickr-input" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">End date </label>
                                <input type="text" id="fp-default" class="form-control flatpickr-basic flatpickr-input" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked />
                                    <label class="custom-control-label" for="customCheck1">Is One Time</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="basic-icon-default-fullname">Status</label>
                                <select class="form-control" id="basicSelect">
                                    <option value="" selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    
@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
    <script src="{{ asset('js/scripts/common/common-action.js') }}"></script>

    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-blockui.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection

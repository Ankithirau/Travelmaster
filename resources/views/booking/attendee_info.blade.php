@extends('layouts.app')

@section('styles')
    <!-- Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- page-header -->
    <div class="page-header">
        <ol class="breadcrumb">
            <!-- breadcrumb -->
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Booking List</li>
        </ol><!-- End breadcrumb -->
    </div>
    <!-- End page-header -->
    <!-- row opened -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body pt-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Created: *:</label>
                                            <input type="text" class="form-control" id=""
                                                value="16-07-2022, 14:18" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="booking_id" class="col-form-label">Booking Number *:</label>
                                            <input type="text" name="booking_id" class="form-control" id="booking_id"
                                                autocomplete="off" value="FT1397830731">
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="col-form-label">Status *:</label>
                                            <select class="form-control" aria-label="Default select example" name="status">
                                                <option selected>Select Status</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="voucher" class="col-form-label">Voucher *:</label>
                                            <input type="text" name="voucher" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="pickup_point_id" class="col-form-label">Pickup Point *:</label>
                                            <select class="form-control" aria-label="Default select example" name="pickup_point_id">
                                                <option selected>Select Pickup Point</option>
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Fare Amount *:</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Discount *:</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Total Amount *:</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Event Name *:</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">No of Seats *:</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="name" class="col-form-label">Notes *:</label>
                                            <textarea name="" id="" cols="20" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label"> &nbsp  Attendee Info *:</label>
                                        <div class="col-sm-10">
                                            <table class="mt-2 table table-bordered key-buttons text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th class="border-bottom-0 bg-primary"> S.No.</th>
                                                        <th class="border-bottom-0 bg-primary"> Attendee Name</th>
                                                        <th class="border-bottom-0 bg-primary"> Attendee phone number</th>
                                                        <th class="border-bottom-0 bg-primary"> Created</th>
                                                        <th class="border-bottom-0 bg-primary"> Total Seat</th>
                                                        <th class="border-bottom-0 bg-primary"> Total Amount</th>
                                                        <th class="border-bottom-0 bg-primary"> Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Jimmy Jemison</td>
                                                        <td>8878564512</td>
                                                        <td>20-07-2022 18:07:18</td>
                                                        <td>1</td>
                                                        <td>&euro;  1900</td>
                                                        <td>
                                                            <input type="button" value="edit" class="btn btn-primary"/>
                                                            <input type="button" value="delete" class="btn btn-danger"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Jimmy Jemison</td>
                                                        <td>8878564512</td>
                                                        <td>20-07-2022 18:07:18</td>
                                                        <td>1</td>
                                                        <td>&euro;  1900</td>
                                                        <td>
                                                            <input type="button" value="edit" class="btn btn-primary"/>
                                                            <input type="button" value="delete" class="btn btn-danger"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Jimmy Jemison</td>
                                                        <td>8878564512</td>
                                                        <td>20-07-2022 18:07:18</td>
                                                        <td>1</td>
                                                        <td>&euro;  1900</td>
                                                        <td>
                                                            <input type="button" value="edit" class="btn btn-primary"/>
                                                            <input type="button" value="delete" class="btn btn-danger"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCounty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add County</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form name="ajax_form" method="post" action="{{ route('county.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name *:</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input value="Close" type="button" class="btn btn-secondary" data-dismiss="modal">
                            <input value="Submit" type="submit" id="form-button" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection('content')

@section('scripts')
    <!--Jquery Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/vendors/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle js-->
    <script src="{{ URL::asset('assets/plugins/vendors/circle-progress.min.js') }}"></script>

    <!--Time Counter js-->
    <script src="{{ URL::asset('assets/plugins/counters/jquery.missofis-countdown.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/counters/counter.js') }}"></script>

    <!-- INTERNAL Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/datatable-2.js') }}"></script>
@endsection

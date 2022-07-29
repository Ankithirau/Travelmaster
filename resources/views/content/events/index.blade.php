@extends('layouts/contentLayoutMaster')

@section('title', 'Ticket')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap4.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.bubble.css')) }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto+Slab&family=Slabo+27px&family=Sofia&family=Ubuntu+Mono&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">

@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-user.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-quill-editor.css')) }}">
@endsection

@section('content')
    <!-- users list start -->
    <section class="app-user-list">
        <!-- users filter start -->

        <!-- users filter end -->
        <!-- list section start -->

        <div class="card">
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
                {{-- <div class="dt-action-buttons text-right">
                    <div class="dt-buttons d-inline-flex">
                        
                    </div>
                </div> --}}

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
    <section class="vertical-wizard">
        <div class="bs-stepper vertical vertical-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#account-details-vertical">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Event Details</span>
                            <span class="bs-stepper-subtitle">Setup Event Details</span>
                        </span>
                    </button>
                </div>
                <div class="step" data-target="#personal-info-vertical">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Event Info</span>
                            <span class="bs-stepper-subtitle">Add Personal Info</span>
                        </span>
                    </button>
                </div>
                <div class="step" data-target="#address-step-vertical">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Event Meta Info</span>
                            <span class="bs-stepper-subtitle">Add Event Meta Info</span>
                        </span>
                    </button>
                </div>
                <div class="step" data-target="#event-info-vertical">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Event Other Info</span>
                            <span class="bs-stepper-subtitle">Add Event Other Info</span>
                        </span>
                    </button>
                </div>
                <div class="step" data-target="#social-links-vertical">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">5</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Event Descriptions</span>
                            <span class="bs-stepper-subtitle">Add Event Descriptions</span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="account-details-vertical" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Events Details</h5>
                        <small class="text-muted">Enter Your Event Details.</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vertical-username">Event Name</label>
                            <input type="text" id="vertical-username" class="form-control"
                                placeholder="Event Name" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vertical-email">Event SKU</label>
                            <input type="email" id="vertical-email" class="form-control" placeholder="JOHN256OP"
                                aria-label="john.doe" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-password-toggle col-md-6">
                            <label class="form-label" for="vertical-password">Event Category</label>
                            <select class="select2 form-control" id="vertical-country">
                                <option label="" selected>Select Category</option>
                                <option>UK</option>
                                <option>USA</option>
                                <option>Spain</option>
                                <option>France</option>
                                <option>Italy</option>
                                <option>Australia</option>
                            </select>
                            {{-- <input type="password" id="vertical-password" class="form-control" placeholder="" /> --}}
                        </div>
                        <div class="form-group form-password-toggle col-md-6">
                            <label class="form-label" for="vertical-confirm-password">Event Status</label>
                            <select class="form-control" id="basicSelect">
                                <option value="" selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                              </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-prev" disabled>
                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                    </div>
                </div>
                <div id="personal-info-vertical" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Event Info</h5>
                        <small>Enter Your Event Info.</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="form-label" for="vertical-first-name">Select County</label>
                                        <select class="select2 w-100" id="vertical-languages" multiple>
                                            <option value="" selected>Select County</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </select>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group-append mt-2" id="button-addon2">
                                        <button class="btn btn-outline-primary waves-effect" type="button" style="margin-top: 2px">Go</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            {{-- <label class="form-label" for="vertical-last-name">Last Name</label>
                            <input type="text" id="vertical-last-name" class="form-control" placeholder="Doe" /> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{-- <label class="form-label" for="vertical-country">Country</label>
                            <div class="form-group"> --}}
                                <label for="customFile">Event Image</label>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Choose Event Image</label>
                                </div>
                            {{-- </div> --}}
                            {{-- <select class="select2 w-100" id="vertical-countrys">
                                <option label=" "></option>
                                <option>UK</option>
                                <option>USA</option>
                                <option>Spain</option>
                                <option>France</option>
                                <option>Italy</option>
                                <option>Australia</option>
                            </select> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fp-multiple">Multiple Dates</label>
                            <input type="text" id="fp-multiple" class="form-control flatpickr-multiple" placeholder="YYYY-MM-DD" />
                            {{-- <label class="form-label" for="vertical-language">Language</label>
                            <select class="select2 w-100" id="vertical-language-dm" multiple>
                                <option>English</option>
                                <option>French</option>
                                <option>Spanish</option>
                            </select> --}}
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                    </div>
                </div>
                <div id="address-step-vertical" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Event Meta Info</h5>
                        <small>Enter Event Meta Info.</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vertical-address">Event Meta Title*</label>
                            <input type="text" id="vertical-address" class="form-control"
                                placeholder="98  Borough bridge Road, Birmingham" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vertical-landmark">Event Meta Tag*</label>
                            <input type="text" id="vertical-landmark" class="form-control"
                                placeholder="Borough bridge" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="pincode2">Event Meta Description :</label>
                            {{-- <input type="text" id="pincode2" class="form-control" placeholder="658921" /> --}}
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                    </div>
                </div>
                <div id="event-info-vertical" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Event Meta Info</h5>
                        <small>Enter Event Meta Info.</small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="vertical-address">Event Attribute*</label>
                            <select class="form-control" id="basicSelect">
                                <option value="" selected>Select Event</option>
                                <option>IT</option>
                                <option>Blade Runner</option>
                                <option>Thor Ragnarok</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label" for="vertical-landmark">Check-ins per ticket </label>
                            <div class="input-group">
                                <input type="number" class="touchspin-min-max" value="1"/>
                              </div>
                        </div>
                        <div class="form-group col-md-4 mt-2" style="margin-top: 2.0rem !important">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                                <label class="custom-control-label" for="customCheck1">Allow ticket check-out</label>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="pincode2">Event Short Description :</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                        </button>
                    </div>
                </div>
                <div id="social-links-vertical" class="content">
                    <div class="content-header">
                        <h5 class="mb-0">Social Links</h5>
                        <small>Enter Your Social Links.</small>
                    </div>
                    {{-- <section class="snow-editor"> --}}
                        <div class="row snow-editor">
                          <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div id="snow-wrapper">
                                      <div id="snow-container">
                                        <div class="quill-toolbar">
                                          <span class="ql-formats">
                                            <select class="ql-header">
                                              <option value="1">Heading</option>
                                              <option value="2">Subheading</option>
                                              <option selected>Normal</option>
                                            </select>
                                            <select class="ql-font">
                                              <option selected>Sailec Light</option>
                                              <option value="sofia">Sofia Pro</option>
                                              <option value="slabo">Slabo 27px</option>
                                              <option value="roboto">Roboto Slab</option>
                                              <option value="inconsolata">Inconsolata</option>
                                              <option value="ubuntu">Ubuntu Mono</option>
                                            </select>
                                          </span>
                                          <span class="ql-formats">
                                            <button class="ql-bold"></button>
                                            <button class="ql-italic"></button>
                                            <button class="ql-underline"></button>
                                          </span>
                                          <span class="ql-formats">
                                            <button class="ql-list" value="ordered"></button>
                                            <button class="ql-list" value="bullet"></button>
                                          </span>
                                          <span class="ql-formats">
                                            <button class="ql-link"></button>
                                            <button class="ql-image"></button>
                                            <button class="ql-video"></button>
                                          </span>
                                          <span class="ql-formats">
                                            <button class="ql-formula"></button>
                                            <button class="ql-code-block"></button>
                                          </span>
                                          <span class="ql-formats">
                                            <button class="ql-clean"></button>
                                          </span>
                                        </div>
                                        <div class="editor">
                                          
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    {{-- </section> --}}
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>

@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/pages/app-user-list.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/form-quill-editor.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/form-number-input.js')) }}"></script>

@endsection

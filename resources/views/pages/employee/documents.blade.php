@extends('master')
@section('admin_page_header', 'Employees')
@section('content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="documents-section">

                <!-- Row start -->
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">

                        <div class="docs-type-container">
                            <div class="mt-5"></div>

                            <div class="docTypeContainerScroll">
                                <div class="docs-block">
                                    <h5>Favourites</h5>
                                    <div class="doc-labels">
                                        <a href="#" class="active">
                                            <i class="icon-receipt"></i> My Files
                                        </a>
                                        <a href="#">
                                            <i class="icon-package"></i> Design
                                        </a>
                                        <a href="#">
                                            <i class="icon-pie-chart1"></i> Daily Reports
                                        </a>
                                        <a href="#">
                                            <i class="icon-layers2"></i> Projects
                                        </a>
                                        <a href="#">
                                            <i class="icon-slack"></i> Business
                                        </a>
                                        <a href="#">
                                            <i class="icon-headphones"></i> Personal
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="docTypeContainerScroll">
                                <div class="docs-block">
                                    <h5>Favourites</h5>
                                    <div class="doc-labels">
                                        @foreach ($employees as $employee)
                                            <a href="{{ route('employees.under.documents',$employee->id) }}" class="">
                                                <i class="icon-receipt"></i> {{ $employee->first_name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            

                        </div>

                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">

                        <div class="documents-container">
                            <div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog"
                                aria-labelledby="addNewDocumentLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addNewDocumentLabel">Add Document</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="docTitle">Document Title</label>
                                                        <input type="text" class="form-control" id="docTitle"
                                                            placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="dovType">Document Type</label>
                                                        <input type="text" class="form-control" id="dovType"
                                                            placeholder="Task Title">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="form-group">
                                                        <label for="addedDate">Created On</label>
                                                        <div class="custom-date-input">
                                                            <input type="text" name=""
                                                                class="form-control datepicker" id="addedDate"
                                                                placeholder="10/10/2019">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group mb-0">
                                                        <label for="docDetails">Document Details</label>
                                                        <textarea class="form-control" id="docDetails"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer custom">
                                            <div class="left-side">
                                                <button type="button" class="btn btn-link danger btn-block"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="right-side">
                                                <button type="button" class="btn btn-link success btn-block">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="documents-header">
                                <h3>Today <span class="date" id="todays-date"></span></h3>
                                <a href="{{ route('employee.create') }}" class="btn btn-primary btn-lg">Add Document</a>
                            </div>
                            <div class="documentsContainerScroll">
                                <div class="documents-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        @foreach ($employeeCertificates as $certificate)
                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                                <div class="doc-block">
                                                    <div class="doc-icon">
                                                        <img src="{{ url('/') }}/assets/img/docs/zip.svg"
                                                            alt="Doc Icon" />
                                                    </div>
                                                    <div class="doc-title">{{ $certificate->document_name }}</div>
                                                    <a href="{{ asset('storage/' . $certificate->document_path) }}"
                                                        target="_blank" download>Download</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Row end -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Row end -->

            </div>
        </div>
    </div>
    <!-- Row end -->
@endsection

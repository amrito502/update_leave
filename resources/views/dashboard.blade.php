@extends('master')
@section('meta_title', 'Dashboard')
@section('admin_page_header', 'Admin Dashboard')
@section('content')
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-user"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $userCount }}</h3>
                    <p>Users</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-briefcase"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $departmentCount }}</h3>
                    <p>Departments</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-bar-chart-2"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $designationCount }}</h3>
                    <p>Designations</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-activity"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $leaveTypeCount }}</h3>
                    <p>Total Leave Types</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-flight_takeoff"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $leaveRequestCount }}</h3>
                    <p>Total Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $employeeCount }}</h3>
                    <p>Total Employees</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-file"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $employeeCertificateCount }}</h3>
                    <p>Total Employee Certificates</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-align-center"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $leaveRequestCount }}</h3>
                    <p>Total Leave Requests</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-bell "></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $noticeCount }}</h3>
                    <p>Total Notice</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-check-circle"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $approvedLeaveRequests }}</h3>
                    <p>Total Leave Approved Request</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-rotate-cw"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $pendingLeaveRequests }}</h3>
                    <p>Total Leave Pending Request</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="info-stats4">
                <div class="info-icon">
                    <i class="icon-alert-octagon"></i>
                </div>
                <div class="sale-num">
                    <h3>{{ $rejectedLeaveRequests }}</h3>
                    <p>Total Leave Rejected Request</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Visitors</div>
                </div>
                <div class="card-body pt-0">
                    <div id="visitors"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->


@endsection

@extends('master')
@section('meta_title', 'Notice Board Details')
@section('admin_page_header', 'Notice Board Details')
@section('content')

    <div class="table-container">
        <div class="rows">
            <div class="col-md-12s">
                @if (session('success'))
                    <div style="border-left: 3px solid green; color: green; background: rgb(233, 229, 229)!important;"
                        class="alert alert-white mt-3" role="alert">{{ session('success') }}</div>
                @endif
                <div class="">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h4 class="mt-2 icon-check-square text-success"> Notice Board Details: </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('notices.index') }}" class="btn btn-success float-right mt-2">All Notices</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>posted_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <tr>
                                    <td>{{ $notice->title }}</td>
                                    <td>{{ $notice->content }}</td>
                                    {{-- <td>{{ date('F j, Y, g:i a', strtotime($notice->posted_at)) }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($notice->posted_at)->formatLocalized('%B %d, %Y, %I:%M %p') }}</td>
                                    <td>
                                        <a href="{{ route('notices.delete',$notice->id) }}" onclick="return confirm('Are you sure to delete in this Notice?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                  </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

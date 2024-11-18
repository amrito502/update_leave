@extends('master')
@section('meta_title', 'Notice Board')
@section('admin_page_header', 'Notice Board')
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
                            <h4 class="mt-2 icon-check-square text-success"> Notice Board: </h4>
                        </div>
                        <div class="col-md-6">
                            <a href="" data-toggle="modal" data-target="#addNotice" class="btn btn-success float-right mt-2">Publish Notice</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>posted_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($notices as $key=>$notice)
                                  <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class=""><a href="{{ route('notices.show',$notice->id) }}" class="text-success" style="text-decoration: underline;">{{ $notice->title }}</a></td>
                                    {{-- <td>{{ date('F j, Y, g:i a', strtotime($notice->posted_at)) }}</td> --}}
                                    <td>{{ \Carbon\Carbon::parse($notice->posted_at)->formatLocalized('%B %d, %Y, %I:%M %p') }}</td>
                                    <td>
                                        <a href="{{ route('notices.delete',$notice->id) }}" onclick="return confirm('Are you sure to delete in this Notice?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addNotice" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewTaskLabel">Publish Notice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('notices.store') }}" method="post">
                        @csrf
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Notice Title">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Posted Date</label>
                                <input type="date" name="posted_at" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Content</label>
                               <textarea name="content" id="Notice Contents" cols="30" rows="10" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="modal-footer custom">
                            <div class="left-side">
                                <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">
                                <button type="submit" class="btn btn-link success btn-block">Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

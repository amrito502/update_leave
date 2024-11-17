@extends('master')
@section('meta_title','Departments')
@section('admin_page_header','Departments')
@section('content')

<div class="table-container">
    <div class="rows">
        <div class="col-md-12s">
            @if (session('success'))
                <div style="border-left: 3px solid green; color: green; background: rgb(233, 229, 229)!important;" class="alert alert-white mt-3" role="alert">{{ session('success') }}</div>
            @endif
            <div class="">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h4 class="mt-2"><div class="icon-check-square text-success"> Departments : </div></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="" data-toggle="modal" data-target="#addNewDepartment" class="btn btn-success float-right mt-2">Add
                            Department</a>
                    </div>
                </div>            
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a href="{{ route('department.edit',$item->id) }}"  class="btn btn-info">Edit</a>
                                    <a href="{{ route('department.delete',$item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                                <p class="text-danger">Department Data Not Available</p>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tasks-container">


<div class="modal fade" id="addNewDepartment" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Create Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('department.store') }}" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Add Department Name">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Description</label>
                           <textarea name="description" id="description" class="form-control" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- =========edit department=========== --}}
<div class="modal fade" id="EditNewDepartment" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTaskLabel">Edit Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Department Name</label>
                            <input type="text" name="name" value="" class="form-control" placeholder="Department Name">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="">Description</label>
                           <textarea name="description" id="description" value="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
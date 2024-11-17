@extends('master')
@section('meta_title','Edit Designation')
@section('admin_page_header','Edit Designation')
@section('content')

<div class="table-container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <h4 class="mt-2">
                                    <div class="icon-check-square text-success"> Edit Designation : </div>
                                </h4>
                            </div>
                            <div class="col-md-6">
                                @can('view role')
                                    <a href="{{ route('designations.index') }}" class="btn btn-success float-right mt-2">Designations</a>
                                @endcan
                            </div>
                        </div>
                </div>
                <div class="">
                    <form action="{{ route('designation.update',$designation->id) }}" method="post">
                        @csrf   
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $designation->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="20" rows="10">{{ $designation->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select 
                                class="form-control @error('department_id') is-invalid @enderror" 
                                id="department_id" 
                                name="department_id" 
                                required>
                                <option value="">Select a Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', $designation->department_id) == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('master')
@section('content')
<section class="main_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5 p-5">
                    <div class="card-header">
                        Student Add
                    </div>
                    <div class="card-body shadow">
                        <form action="{{ route('new.store') }}" method="post">
                            @csrf
                            <input type="text" name="name" class="form-control" placeholder="enter your name">
                            <input type="text" name="email" class="form-control mt-3" placeholder="enter your email">
                            <input type="text" name="phone" class="form-control mt-3" placeholder="enter your phone">
                            <input type="text" name="class" class="form-control mt-3" placeholder="enter your class">
                            <input type="text" name="branch" class="form-control mt-3" placeholder="enter your branch">
                            <input type="text" name="shift" class="form-control mt-3" placeholder="enter your shift">
                            <select id="gender" name="gender" class="form-control mt-3">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <input type="submit" value="Add student" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
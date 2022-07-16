@extends('Admin.adminnav')

@section('admin')
   <div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully!</strong> Logged in as an <strong>Admin</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        <div class="col-lg-12 d-flex mt-3">
            <div class="col-4 p-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h1 class="display-2">{{ $admin }}</h1>
                        <h5>Total Admins</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card bg-success  text-white">
                    <div class="card-body">
                        <h1 class="display-2">{{ $doctor }}</h1>
                        <h5>Total Doctors</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 p-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h1 class="display-2">{{ $staff }}</h1>
                        <h5>Total Staffs</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
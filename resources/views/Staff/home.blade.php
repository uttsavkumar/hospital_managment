@extends('Staff.staffnav')

@section('staff')
   <div class="container ">
    <div class="row ms-5">
        <div class="col-10 mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully!</strong> Logged in as a <strong>Staff</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>
        <div class="col-lg-10 d-flex mt-3">
            <div class="col-4 p-3">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h1 class="display-2">{{ $patients }}</h1>
                        <h5>Total Patients</h5>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
   </div>
@endsection
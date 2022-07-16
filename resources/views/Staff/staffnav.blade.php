@extends('base')

@section('staffnav')

   <div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;" >
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-5">Hospital Managment(Staff)</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item ">
                    <a href="{{ route('staff.index') }}" class="nav-link text-white {{ Request::routeIs('staff.index') ? 'active' : null }}" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                     Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('staff.patient') }}" class="nav-link text-white {{ Request::routeIs('staff.create') || Request::routeIs('staff.patient')  ? 'active' : null }}" >
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                      Manage Patients
                    </a>
                  </li>
                
                 
                </ul>
                <hr>
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb2QSxrS5OMl6YwkAK2wVdOqZgEs3otHYfdA&usqp=CAU" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>
                       {!! Session::get('staff') !!}
                    </strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                  
                    <li><a class="dropdown-item" href="{{ route('staff.logout') }}">Sign out</a></li>
                  </ul>
                </div>
              </div>
        </div>
        <div class="col-10 p-0">
            <div class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
              <div class="container-fluid p-3 m-0">
                <h5 class="text-white">Branch : {!! Session::get('staff_branch') !!}</h5> 
              </div>
            </div>
            @section('staff')
            @show
        </div>
    </div>
   </div>
   
@endsection
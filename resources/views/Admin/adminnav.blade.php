@extends('base')

@section('adminnav')

   <div class="container-fluid">
    <div class="row">
        <div class="col-3 p-0">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;width:280px" >
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-5">Hospital Managment</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item ">
                    <a href="{{ route('admin.home') }}" class="nav-link text-white {{ Request::routeIs('admin.home') ? 'active' : null }}" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                     Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.branch') }}" class="nav-link text-white {{ Request::routeIs('admin.branch') || Request::routeIs('admin.insertbranch')  ? 'active' : null }}" >
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                      Manage Branches
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.doctor') }}" class="nav-link text-white {{ Request::routeIs('admin.doctor') || Request::routeIs('admin.insertdoctor')  ? 'active' : null }}">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                      Manage Doctors
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.staff') }}" class="nav-link text-white {{ Request::routeIs('admin.staff') || Request::routeIs('admin.insertstaff')  ? 'active' : null }}">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                      Manage Staff           
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.newadmin') }}" class="nav-link text-white {{ Request::routeIs('admin.newadmin') || Request::routeIs('admin.insertnewadmin')  ? 'active' : null }}">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                      Manage Other Admins
                    </a>
                  </li>
                 
                </ul>
                <hr>
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb2QSxrS5OMl6YwkAK2wVdOqZgEs3otHYfdA&usqp=CAU" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>
                       {!! Session::get('admin') !!}
                    </strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                  
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Sign out</a></li>
                  </ul>
                </div>
              </div>
        </div>
        <div class="col-9">
            
            @section('admin')
            @show
        </div>
    </div>
   </div>
   
@endsection
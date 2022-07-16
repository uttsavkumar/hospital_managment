@extends('base')

@section('docnav')

   <div class="container-fluid">
    <div class="row">
        <div class="col-3 p-0">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height:100vh;" >
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-5">Hospital Managment(Doctor)</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item ">
                    <a href="{{ route('doctor.home') }}" class="nav-link text-white {{ Request::routeIs('doctor.home') ? 'active' : null }}" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                     Home
                    </a>
                  </li>
                  <li class="nav-item">
                    <ul class="nav nav-pills flex-column mb-auto ">
                        <li class="mb-1 " style="margin-left: 30px">
                            <button class="btn btn-toggle d-inline-flex text-white align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                              Patient Graph
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                              </svg>
                            </button>
                            <div class="collapse show" id="home-collapse" style="">
                              <ul class="btn-toggle-nav list-unstyled fw-normal">
                                @foreach ($branch as $item)
                                <li><a href="{{ route('doctor.graph',$item->id) }}" class="nav-link text-white" style="margin-top: -5px">{{ $item->branch_name }}</a></li>
                                    
                                @endforeach                                
                              </ul>
                            </div>
                          </li>
                    </ul>
                  </li>
                
                
                 
                </ul>
                <hr>
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQb2QSxrS5OMl6YwkAK2wVdOqZgEs3otHYfdA&usqp=CAU" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>
                       {!! Session::get('doctor') !!}
                    </strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                  
                    <li><a class="dropdown-item" href="{{ route('doctor.logout') }}">Sign out</a></li>
                  </ul>
                </div>
              </div>
        </div>
        <div class="col-9 p-0">
            
            @section('doctor')
            @show
        </div>
    </div>
   </div>
   
@endsection
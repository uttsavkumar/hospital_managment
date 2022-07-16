@extends('Admin.adminnav')

@section('admin')
    <div class="container p-5">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.doctor') }}" class="btn btn-dark  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                      </svg>
                </a>
            </div>
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                       <form action="" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="name"
                                value="{{ old('name') }}" placeholder="Enter Doctor name">
                            <label for="floatingInput">Doctor Name</label>
                            @error('name')
                                <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email"
                                value="{{ old('email') }}" placeholder="Enter Email">
                            <label for="floatingInput">Email Address</label>
                            @error('email')
                                <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingInput" name="password"
                                value="{{ old('password') }}" placeholder="Enter Password">
                            <label for="floatingInput">Password</label>
                            @error('password')
                                <p class="text-danger text-small">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Assign Doctor" class="btn btn-success w-100">
                       </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
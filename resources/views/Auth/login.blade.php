@extends('Auth.authnav')

@section('login')

    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                @if (Session::has('email'))
                    {!! Session::get('email') !!}
                @endif
                @if(Session::has('password'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close float-end"  data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Incorrect!</strong> {!!Session::get('password')!!}
                </div>
            @endif
                <span style="font-size: 15px;color:#c3c3c3" class="p-2">Login as an Admin, Doctor or Staff</span>
                <div class="card mt-2">
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="email"
                                    value="{{ old('email') }}" placeholder="name@example.com">
                                <label for="floatingInput"> Email Address</label>
                                @error('email')
                                    <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword"
                                    value="{{ old('password') }}" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mb-4">
                                <input type="submit" value="Login" class="btn text-white w-100"
                                    style="height: 45px;background-color:black">
                            </div>
                            <div class="mb-5">
                                <a href="{{ route('register') }}" class="text-primary float-start"><u>Register as an
                                        Admin?</u></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

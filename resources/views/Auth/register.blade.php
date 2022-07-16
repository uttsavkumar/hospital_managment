@extends('Auth.authnav')

@section('register')
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="name"
                                    value="{{ old('name') }}" placeholder="name@example.com">
                                <label for="floatingInput">Admin Name</label>
                                @error('name')
                                    <p class="text-danger text-small">{{ $message }}</p>
                                @enderror
                            </div>
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
                                <input type="submit" value="Create Account" class="btn text-white w-46 float-end"
                                    style="height: 45px;background-color:black">
                            </div>
                            <div class="mb-5">
                                <a href="{{ route('login') }}" class="text-primary float-start"><u>Already have an Account?</u></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

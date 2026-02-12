@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5">
        <div class="col-md-6 mx-auto">
            <div class="card border-top border-0 border-4 border-dark">
                <div class="card-body py-5 px-3">
                    <div class="card-title text-center">
                        <h5 class="mb-5 mt-2 text-dark">User Login</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group input-group-lg">
                                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Enter Password</label>
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control border-start-0 @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password" value="{{ old('password') }}"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('password.request') }}">Forgot Password ?</a>
                        </div>
                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class='bx bxs-lock-open'></i>Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

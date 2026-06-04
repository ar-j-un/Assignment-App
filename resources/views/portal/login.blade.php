@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        
        <div class="card card-primary card-outline shadow-sm">
            <div class="card-header text-center">
                <h3 class="card-title float-none fw-bold">Account Sign In</h3>
            </div>
            
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf
                
                <div class="card-body">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" placeholder="Enter password" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="card-footer d-grid">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="small">Don't have an account? Register here</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
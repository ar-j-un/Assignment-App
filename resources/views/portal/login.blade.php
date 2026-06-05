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
                            <x-form.input 
                                name="email" 
                                label="Email ID" 
                                type="email" 
                                placeholder="Enter email" 
                                icon="fas fa-envelope" 
                                required 
                            />
                        </div>
                    </div>

                    <div class="mb-3">
                        <x-form.input 
                            name="password" 
                            label="Password" 
                            type="password" 
                            placeholder="Enter password" 
                            icon="fas fa-lock" 
                            required 
                        />
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
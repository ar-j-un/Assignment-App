@extends('layouts.app')

@section('title', 'Register New User')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        
        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h3 class="card-title">Employee Registration Form</h3>
            </div>
            
            <form action="{{ route('register.store') }}" method="POST">
                @csrf 
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <x-form.input name="name" label="Full Name" placeholde="Name" required />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="email" label="Email ID" type="email" placeholder="john@example.com" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form.input name="password" label="Password" type="password" required />
                        </div>
                        
                        <div class="col-md-6">
                            <x-form.input name="password_confirmation" label="Confirm Password" type="password" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <x-form.input name="phone_number" label="Phone Number" type="tel" placeholder="+1 234 567 8900" required />
                        </div>
                        
                        <div class="col-md-6">
                            <x-form.input name="age" label="Age" type="number" min="18" max="100" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label">Department<span class="text-danger">*</span></label>
                            <select class="form-select @error('department') is-invalid @enderror" id="department" name="department" required>
                                <option value="" disabled selected>Select Department...</option>
                                <option value="IT" {{ old('department') === 'IT' ? 'selected' : '' }}>Information Technology</option>
                                <option value="HR" {{ old('department') === 'HR' ? 'selected' : '' }}>Human Resources</option>
                                <option value="Finance" {{ old('department') === 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="Marketing" {{ old('department') === 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            </select>
                            @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <x-form.input name="designation" label="Designation" placeholder="e.g., Senior Developer" required />
                        </div>
                    </div>
                </div> <div class="card-footer d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary me-2">Clear</button>
                    <button type="submit" class="btn btn-primary">Register User</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
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
                   <x-form.user-fields />
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="reset" class="btn btn-secondary me-2">Clear</button>
                    <button type="submit" class="btn btn-primary">Register User</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
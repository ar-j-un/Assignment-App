@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary p-3 rounded position-relative overflow-hidden">
                <div class="inner">
                    <h3 class="fw-bold fs-2">Card</h3>
                    <p class="mb-0">Details</p>
                </div>
                <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                    <i class="fas fa-shopping-cart fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
@endsection
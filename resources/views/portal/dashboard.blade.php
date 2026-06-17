@extends('layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row">
    
    @auth
        <div class="col-lg-7 col-md-6 mb-4  ">
            <div class="card card-primary card-outline shadow-sm h-100">
                <div class="card-header">
                    <h3 class="card-title fw-bold m-0 text-primary">
                        <i class="fas fa-user-shield me-2"></i> My Profile Details
                    </h3>
                </div>
                
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <tbody>
                            <tr>
                                <th style="width: 35%;" class="ps-4 py-3 text-muted">Full Name</th>
                                <td class="py-3 fw-bold text-dark">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Email ID</th>
                                <td class="py-3 text-dark">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Phone Number</th>
                                <td class="py-3 text-dark">{{ $user->phone ?? 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Age</th>
                                <td class="py-3 text-dark">{{ $user->age ?? 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Department</th>
                                <td class="py-3">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle px-2.5 py-1.5 fs-7 fw-semibold">
                                        {{ $user->department }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Designation</th>
                                <td class="py-3 text-secondary italic">{{ $user->designation }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer bg-light-subtle d-flex justify-content-between align-items-center p-3">
                    <span class="text-muted small">Joined {{ $user->created_at->format('M d, Y') }}</span>
                    <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm fw-semibold shadow-sm" style="margin-left: -75px;">
                        View Full Profile <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-4">
            
            <div class="small-box text-bg-success p-4 rounded-3 shadow-sm position-relative overflow-hidden mb-4">
                <div class="inner pb-2">
                    <h3 class="fw-bold fs-2 text-white mb-1">Create Recipe</h3>
                    <p class="mb-0 text-white-50">Publish and share a new culinary masterpiece step-by-step!</p>
                </div>
                
                <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                    <i class="fas fa-utensils fa-4x text-white"></i>
                </div>
                
                <div class="mt-4 pt-1">
                    <a href="{{ route('recipes.create') }}" class="btn btn-light btn-sm fw-bold px-3 text-success shadow-sm rounded-2">
                        <i class="fas fa-plus-circle me-1"></i> Add Recipe Now
                    </a>
                </div>
            </div>
            @if ($user->recipes->count() > 0)
                <div class="small-box text-bg-info p-4 rounded-3 shadow-sm position-relative overflow-hidden mb-4 animate__animated animate__fadeIn">
                    <div class="inner pb-2">
                        <h3 class="fw-bold fs-2 text-white mb-1">{{ $user->recipes->count() }}</h3>
                        <p class="mb-0 text-white-50">Recipes currently published in your collection</p>
                    </div>
                    
                    <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                        <i class="fas fa-book-open fa-4x text-white"></i>
                    </div>
                    
                    <div class="mt-4 pt-1">
                        <a href="{{ route('recipes.index') }}" class="btn btn-light btn-sm fw-bold px-3 text-info shadow-sm rounded-2">
                            <i class="fas fa-eye me-1"></i> View My Collection
                        </a>
                    </div>
                </div>
            @endif
        </div>
    @endauth

    @guest
        <div class="col-md-8 mx-auto text-center mt-5">
            <div class="p-5 bg-white rounded shadow-sm border">
                <i class="fas fa-cubes text-primary fa-4x mb-4"></i>
                <h2 class="fw-bold text-secondary">Welcome to the Public Portal</h2>
                <p class="text-muted lead px-lg-5">
                    To access your customized dashboard, manage features, and review your internal professional credentials, please sign into your workspace profile.
                </p>
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary fw-bold px-4 py-2 me-2 shadow-sm">
                        <i class="fas fa-sign-in-alt me-2"></i> Sign In Now
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4 py-2">
                        Create an Account
                    </a>
                </div>
            </div>
        </div>
    @endguest
        <div class="small-box text-bg-warning p-20 rounded-3 shadow-sm position-relative overflow-hidden mb-4 animate__animated animate__fadeIn">
            <div class="inner pb-2">
                <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                    <i class="fas fa-user-shield fa-4x text-white"></i>
                </div>
            <div class="mt-4 pt-1">
                <a href="{{ route('users') }}" class="btn btn-light btn-sm fw-bold px-3 text-warning shadow-sm rounded-2">
                    <i class="fas fa-eye me-1"></i> View All Users
                </a>
            </div>
        </div>
</div>
@endsection




        {{-- <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary p-3 rounded position-relative overflow-hidden">
                <div class="inner">
                    <h3 class="fw-bold fs-2">Card</h3>
                    <p class="mb-0">Details</p>
                </div>
                <div class="small-box-icon position-absolute end-0 top-0 m-3 opacity-25">
                    <i class="fas fa-shopping-cart fa-3x"></i>
                </div>
            </div>
        </div> --}}
@extends('layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row">
    
    @auth
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="card card-primary card-outline shadow-sm">
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
                                <td class="py-3 fw-bold text-dark">{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Email ID</th>
                                <td class="py-3 text-dark">{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Phone Number</th>
                                <td class="py-3 text-dark">{{ Auth::user()->phone_number ?? 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Age</th>
                                <td class="py-3 text-dark">{{ Auth::user()->age ?? 'Not Provided' }}</td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Department</th>
                                <td class="py-3"><span class="badge bg-info-subtle text-info border border-info-subtle px-2.5 py-1.5 fs-7 fw-semibold">{{ Auth::user()->department }}</span></td>
                            </tr>
                            <tr>
                                <th class="ps-4 py-3 text-muted">Designation</th>
                                <td class="py-3 text-secondary italic">{{ Auth::user()->designation }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer bg-light-subtle ps-4 text-muted small py-3">
                    Account Created: {{ Auth::user()->created_at->format('F d, Y') }}
                </div>
            </div>
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
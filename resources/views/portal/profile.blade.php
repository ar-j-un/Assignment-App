@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- AdminLTE Style Profile Widget (Top) -->
        <div class="card card-widget widget-user shadow-sm mb-4 rounded-3 overflow-hidden">
            <div class="bg-primary text-white text-center py-5">
                <h3 class="fw-bold mb-0">{{ $user->name }}</h3>
                <p class="mb-0 text-white-50">{{ $user->designation }}</p>
            </div>
            
            <!-- Circular Avatar Container -->
            <div class="d-flex justify-content-center" style="margin-top: -50px;">
                <div>
                    @if ($user->profile_image_path)
                        <img src="{{ asset('storage/' . $user->profile_image_path) }}" 
                             alt="User Profile Photo" 
                             class="rounded-circle object-fit-cover" 
                             style="width: 100px; height: 100px; border: 2px solid var(--bs-primary-border-subtle);">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light text-primary rounded-circle border border-2 border-primary-subtle" style="width: 100px; height: 100px; font-size: 2.5rem;">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="card-footer bg-white border-0 text-center pt-3 pb-4">
                <span class="badge text-bg-light border px-3 py-2 text-muted fw-semibold">
                    <i class="fas fa-building me-1"></i> {{ $user->department }}
                </span>
                <span class="badge text-bg-light border px-3 py-2 text-muted fw-semibold ms-2">
                    Joined {{ $user->created_at->format('M Y') }}
                </span>
            </div>
        </div>

        <!-- Edit Profile Form Card (Bottom) -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-light-subtle py-3">
                <h5 class="card-title mb-0 fw-bold text-secondary">
                    <i class="fas fa-user-edit me-2"></i> Update Personal Details
                </h5>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card-body p-4">
                    <div class="row">

                        <div class="col-md-6">
                            <x-form.input name="name" label="Full Name" :value="$user->name" required />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="email" label="Email Address" type="email" :value="$user->email" disabled />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="phone_number" label="Phone Number" type="tel" :value="$user->phone_number" />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="age" label="Age" type="number" :value="$user->age" />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="department" label="Department" :value="$user->department" required />
                        </div>

                        <div class="col-md-6">
                            <x-form.input name="designation" label="Designation" :value="$user->designation" required />
                        </div>
                        
                        <div class="col-12 mb-2">
                            <label for="profile_image_path" class="form-label fw-semibold">Upload Profile Photo</label>
                            <input class="form-control @error('profile_image_path') is-invalid @enderror" type="file" id="profile_image_path" name="profile_image_path" accept="image/*">
                            <div class="form-text small">Accepted formats: JPG, PNG, GIF (Max 500KB).</div>
                            @error('profile_image_path') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>
                </div>

                <div class="card-footer bg-light-subtle text-end py-3 px-4">
                    <button type="submit" class="btn btn-primary fw-bold px-4 shadow-sm">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
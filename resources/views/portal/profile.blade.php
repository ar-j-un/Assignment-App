@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">

        <!-- Success Message Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
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
                    @if($user->profile_image)
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

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label fw-semibold text-muted">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control bg-light" id="email" value="{{ $user->email }}" disabled>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="phone_number" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="+1 234 567 8900">
                            @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label fw-semibold">Age <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', $user->age) }}">
                            @error('age') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="department" class="form-label fw-semibold">Department <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $user->department) }}" required>
                            @error('department') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="designation" class="form-label fw-semibold">Designation <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $user->designation) }}" required>
                            @error('designation') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
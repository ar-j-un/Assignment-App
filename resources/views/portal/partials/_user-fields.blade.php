@php
    $user = $user ?? null;
@endphp

<div class="row">
    <div class="col-md-6">
        <x-form.input 
            name="name" 
            label="Full Name" 
            :value="$user?->name" 
            placeholder="Name" 
            required 
        />
    </div>

    <div class="col-md-6">
        <x-form.input 
            name="email" 
            label="{{ $user ? 'Email Address' : 'Email ID' }}" 
            type="email" 
            :value="$user?->email" 
            placeholder="john@example.com" 
            :disabled="(bool)$user" 
            :required="!$user" 
        />
    </div>

    @if (!$user)
        <div class="col-md-6">
            <x-form.input 
                name="password" 
                label="Password" 
                type="password" 
                placeholder="Enter password" 
                required 
            />
        </div>
        
        <div class="col-md-6">
            <x-form.input 
                name="password_confirmation" 
                label="Confirm Password" 
                type="password" 
                placeholder="Enter password again" 
                required 
            />
        </div>
    @endif

    <div class="col-md-6">
        <x-form.input 
            name="phone_number" 
            label="Phone Number" 
            type="tel" 
            :value="$user?->phone_number" 
            placeholder="+1 234 567 8900" 
            :required="!$user" 
        />
    </div>

    <div class="col-md-6">
        <x-form.input 
            name="age" 
            label="Age" 
            type="number" 
            :value="$user?->age" 
            min="18" 
            max="100" 
            :required="!$user" 
        />
    </div>

    <div class="col-md-6 mb-3">
        <label for="department" class="form-label fw-semibold">Department<span class="text-danger">*</span></label>
        <select class="form-select @error('department') is-invalid @enderror" id="department" name="department" :required="!$user">
            <option value="" disabled {{ old('department', $user?->department ?? '') === '' ? 'selected' : '' }}>Select Department...</option>
            <option value="IT" {{ old('department', $user?->department ?? '') === 'IT' ? 'selected' : '' }}>Information Technology</option>
            <option value="HR" {{ old('department', $user?->department ?? '') === 'HR' ? 'selected' : '' }}>Human Resources</option>
            <option value="Finance" {{ old('department', $user?->department ?? '') === 'Finance' ? 'selected' : '' }}>Finance</option>
            <option value="Marketing" {{ old('department', $user?->department ?? '') === 'Marketing' ? 'selected' : '' }}>Marketing</option>
        </select>
        @error('department')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6">
        <x-form.input 
            name="designation" 
            label="Designation" 
            :value="$user?->designation" 
            placeholder="e.g., Senior Developer" 
            :required="!$user"
        />
    </div>

    @if ($user)
        <div class="col-12 mb-2">
            <label for="profile_image_path" class="form-label fw-semibold">Upload Profile Photo</label>
            <input class="form-control @error('profile_image_path') is-invalid @enderror" type="file" id="profile_image_path" name="profile_image_path" accept="image/*">
            <div class="form-text small">Accepted formats: JPG, PNG, GIF (Max 500KB).</div>
            @error('profile_image_path')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endif
</div>
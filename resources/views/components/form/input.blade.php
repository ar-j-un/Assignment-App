@props([
    'name',
    'label',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'required' => false,
    'disabled' => false,
    'icon' => null,
])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label fw-semibold">
        {{ $label }} 
        @isset($required)
            <span class="text-danger">*</span>
        @endisset
    </label>
    
   <div class="{{ $icon ? 'input-group' : '' }}">
        @isset($icon)
            <span class="input-group-text">
                <i class="{{ $icon }}"></i></span>
        @endisset

    <input 
        type="{{ $type }}" 
        class="form-control @error($name) is-invalid @enderror" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $attributes }}
    >

    </div>
    
    @error($name) 
        <div class="invalid-feedback d-block">{{ $message }}</div> 
    @enderror
</div>
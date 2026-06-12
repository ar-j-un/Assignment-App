@extends('layouts.app')

@section('title', 'Add New Recipe')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card card-primary card-outline shadow-sm border-0">
            <div class="card-header bg-light-subtle py-3">
                <h3 class="card-title mb-0 fw-bold text-secondary">
                    <i class="fas fa-utensils me-2 text-primary"></i> Recipe Details
                </h3>
            </div>
            
            <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-5 border-end-md pe-md-4">
                            
                            <x-form.input 
                                name="recipe_name" 
                                label="Recipe Name" 
                                placeholder="e.g., Spicy Basil Chicken" 
                                required 
                            />

                            <x-form.input 
                                name="cooking_time" 
                                label="Cooking Time (Minutes)" 
                                type="number" 
                                min="1"
                                placeholder="e.g., 45" 
                                icon="fas fa-clock"
                                required 
                            />

                            <div class="mb-4">
                                <label for="recipe-image" class="form-label fw-semibold">Recipe Image <span class="text-danger">*</span></label>
                                <input class="form-control @error('recipe_image') is-invalid @enderror" type="file" id="recipe-image" name="recipe_image" accept="image/*" required>
                                <div class="form-text small">Upload a beautiful photo of the finished dish.</div>
                                @error('recipe_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-7 ps-md-4">
                            
                            <div class="mb-3">
                                <label for="ingredients" class="form-label fw-semibold">Ingredients <span class="text-danger">*</span></label>
                                <input type="text" 
                                    class="form-control @error('ingredients') is-invalid @enderror" 
                                    id="ingredients" 
                                    name="ingredients" 
                                    value="{{ old('ingredients') }}"
                                    placeholder="e.g. Chicken Breast, Fresh Garlic, Olive Oil, Salt" 
                                    required>
                                <div class="form-text small text-muted">Separate each ingredient with a comma ( , ) to automatically generate tags.</div>
                                @error('ingredients')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="steps" class="form-label fw-semibold">Cooking Steps <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('steps') is-invalid @enderror" id="steps" name="steps" rows="5" placeholder="1. First step...&#10;2. Second step..." required>{{ old('steps') }}</textarea>
                                @error('steps')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="additional_notes" class="form-label fw-semibold">Additional Notes (Optional)</label>
                                <textarea class="form-control @error('additional_notes') is-invalid @enderror" id="additional_notes" name="additional_notes" rows="2" placeholder="Dietary warnings, serving suggestions, etc.">{{ old('additional_notes') }}</textarea>
                                @error('additional_notes')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div> 
                
                <div class="card-footer bg-light-subtle d-flex justify-content-end py-3 px-4">
                    <button type="reset" class="btn btn-secondary me-2 fw-bold px-4 shadow-sm">Reset</button>
                    <button type="submit" class="btn btn-primary fw-bold px-4 shadow-sm">
                        <i class="fas fa-save me-2"></i> Save Recipe
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
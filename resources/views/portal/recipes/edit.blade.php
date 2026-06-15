@extends('layouts.app')

@section('title', 'Edit Recipe')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-primary card-outline shadow-sm border-0">
            <div class="card-header bg-light-subtle py-3">
                <h3 class="card-title mb-0 fw-bold text-secondary">
                    <i class="fas fa-utensils me-2 text-primary"></i> Recipe Details
                </h3>
            </div>
            
            <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PATCH') 
                
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-5 border-end-md pe-md-4"> 
                            <x-form.input 
                                name="recipe_name" 
                                label="Recipe Name" 
                                :value="old('recipe_name', $recipe->recipe_name)" 
                                required 
                            />
                            <x-form.input 
                                name="cooking_time" 
                                label="Cooking Time (Minutes)" 
                                type="number" 
                                min="1"
                                :value="old('cooking_time', $recipe->cooking_time)" 
                                icon="fas fa-clock"
                                required 
                            />
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Current Recipe Image</label>
                                    <div class="mb-2">
                                        <img
                                            src="{{ Storage::url($recipe->recipe_image_path) }}"
                                            alt="{{ $recipe->recipe_name }}"
                                            class="img-fluid img-thumbnail shadow-sm"
                                            style="max-width: 250px; max-height: 250px;">
                                    </div>
                                <label for="recipe-image" class="form-label fw-semibold">
                                    Replace Image
                                </label>
                                <input
                                    class="form-control @error('recipe_image') is-invalid @enderror"
                                    type="file"
                                    id="recipe-image"
                                    name="recipe_image"
                                    accept="image/*">
                                <div class="form-text small">
                                    Leave empty to keep the current image.
                                </div>
                                @error('recipe_image')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-7 ps-md-4">
                            <div class="mb-3">
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/css/tom-select.bootstrap5.min.css" />
                                <script src="https://cdn.jsdelivr.net/npm/tom-select@2.6.1/dist/js/tom-select.complete.min.js"></script>
                                <label for="ingredients" class="form-label fw-semibold">Ingredients <span class="text-danger">*</span></label>
                                <input type="text" 
                                    class="form-control @error('ingredients') is-invalid @enderror" 
                                    id="ingredients" 
                                    name="ingredients" 
                                    value="{{ old('ingredients', implode(',', $recipe->ingredients ?? [])) }}" 
                                    required>
                                <script>
                                new TomSelect("#ingredients", { plugins: ["remove_button"], persist: false, create: true, createOnBlur: true, delimiter: ",", maxOptions: 0, 
                                    render: {
                                        no_results: () => '',
                                        option_create: () => '',
                                    }
                                });
                                </script>
                                @error('ingredients')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="steps" class="form-label fw-semibold">Cooking Steps <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('steps') is-invalid @enderror" id="steps" name="steps" rows="5" required>{{ old('steps', $recipe->steps) }}</textarea>
                                @error('steps')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="additional_notes" class="form-label fw-semibold">Additional Notes (Optional)</label>
                                <textarea class="form-control @error('additional_notes') is-invalid @enderror" id="additional_notes" name="additional_notes" rows="2" required>{{ old('additional_notes', $recipe->additional_notes) }}</textarea>
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
                        <i class="fas fa-save me-2"></i> Edit Recipe
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
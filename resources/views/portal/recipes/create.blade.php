@extends('layouts.app')

@section('title', 'Add New Recipe')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
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
                           <div class="mb-3" 
                                x-data="{ 
                                    tags: {{ old('ingredients') ? json_encode(array_filter(array_map('trim', explode(',', old('ingredients'))))) : '[]' }}, 
                                    newTag: '',
                                    colors: ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning text-dark', 'bg-info text-dark', 'bg-dark', 'bg-secondary'],
                                    
                                    addTag() {
                                        let clean = this.newTag.trim().replace(/,/g, '');
                                        if (clean && !this.tags.includes(clean)) {
                                            this.tags.push(clean);
                                        }
                                        this.newTag = '';
                                    },
                                    removeTag(index) {
                                        this.tags.splice(index, 1);
                                    }
                                }">
                                
                                <label for="ingredient-input" class="form-label fw-semibold">Ingredients <span class="text-danger">*</span></label>
                                
                                <div class="form-control h-auto d-flex flex-wrap gap-2 align-items-center @error('ingredients') is-invalid @enderror" 
                                    @click="$refs.tagInput.focus()" 
                                    style="min-height: 38px; cursor: text;">
                                    
                                    <template x-for="(tag, index) in tags" :key="index">
                                        <span :class="'ingredient-tag badge d-flex align-items-center px-2 py-1 fs-7 ' + colors[index % colors.length]">
                                            <span class="me-2" x-text="tag"></span>
                                            <button type="button" 
                                                    :class="'btn-close ' + (colors[index % colors.length].includes('bg-warning') ? '' : 'btn-close-white')" 
                                                    style="font-size: 0.45rem;" 
                                                    @click.stop="removeTag(index)" 
                                                    aria-label="Remove"></button>
                                        </span>
                                    </template>

                                    <input type="text" 
                                        x-ref="tagInput"
                                        x-model="newTag" 
                                        @keydown.enter.prevent="addTag()"
                                        @keydown.comma.prevent="addTag()"
                                        @keydown.backspace="if (newTag === '' && tags.length > 0) removeTag(tags.length - 1)"
                                        class="border-0 shadow-none flex-grow-1" 
                                        style="outline: none; min-width: 150px; background: transparent;" 
                                        placeholder="e.g. Chicken, Garlic, Olive Oil...">
                                </div>

                                <input type="hidden" name="ingredients" :value="tags.join(',')">

                                <div class="form-text small text-muted">Press <strong>Enter</strong> or type a <strong>comma ( , )</strong> to create a tag.</div>
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
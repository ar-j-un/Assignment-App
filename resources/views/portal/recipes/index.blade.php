@extends('layouts.app')

@section('title', 'My Recipes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-secondary mb-0"><i class="fas fa-book-open me-2 text-primary"></i> My Recipe Collection</h2>
    <a href="{{ route('recipes.create') }}" class="btn btn-primary shadow-sm fw-bold">
        <i class="fas fa-plus me-1"></i> New Recipe
    </a>
</div>

<div class="row">
    @forelse($recipes as $recipe)
        @php
            // $ingredientCount = count(array_filter(explode("\n", str_replace("\r", "", $recipe->ingredients))));
            $ingredientCount = is_array($recipe->ingredients) ? count($recipe->ingredients) : 0;
        @endphp

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden recipe-card">
                <a href="{{ route('recipes.view', $recipe) }}" class="d-block position-relative ratio ratio-16x9">
                    <img src="{{ Storage::url($recipe->recipe_image_path) }}" 
                         alt="{{ $recipe->recipe_name }}" 
                         class="object-fit-cover w-100 h-100"
                         style="transition: transform 0.3s ease;">
                </a>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark mb-2">
                        <a href="{{ route('recipes.view', $recipe) }}" class="text-decoration-none text-dark">{{ $recipe->recipe_name }}</a>
                    </h5>
                    
                    <div class="mb-3 d-flex gap-2 flex-wrap">
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 fs-7">
                            <i class="fas fa-carrot me-1"></i> {{ $ingredientCount }} Ingredients
                        </span>
                        <span class="badge bg-light text-dark border px-2 py-1 fs-7 shadow-sm">
                            <i class="fas fa-clock text-warning me-1"></i> {{ $recipe->cooking_time }} mins
                        </span>
                    </div>

                    <p class="card-text text-muted small flex-grow-1">
                        {{ Str::limit($recipe->steps, 100, '...') }}
                    </p>

                    <a href="{{ route('recipes.view', $recipe) }}" class="btn btn-outline-primary btn-sm fw-bold mt-3 stretched-link">
                        View Recipe <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded shadow-sm border border-light">
                <i class="fas fa-utensils text-muted fa-4x mb-3 opacity-50"></i>
                <h3 class="fw-bold text-secondary">No Recipes Yet</h3>
                <p class="text-muted">You haven't added any recipes to your collection.</p>
                <a href="{{ route('recipes.create') }}" class="btn btn-primary mt-2">
                    Create Your First Recipe
                </a>
            </div>
        </div>
    @endforelse
</div>

<style>
    .recipe-card:hover img {
        transform: scale(1.05);
    }
</style>
@endsection
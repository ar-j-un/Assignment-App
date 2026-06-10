@extends('layouts.app')

@section('title', $recipe->recipe_name)

@section('content')
<div class="mb-3">
    <a href="{{ route('recipes.index') }}" class="text-decoration-none text-muted fw-bold">
        <i class="fas fa-arrow-left me-1"></i> Back to My Recipes
    </a>
</div>

<div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-5">
    
    <div class="position-relative bg-dark" style="height: flex-grow;">
        <img src="{{ Storage::url($recipe->recipe_image_path) }}" 
             alt="{{ $recipe->recipe_name }}" 
             class="w-100 h-100 object-fit-cover opacity-75">
        
        <div class="position-absolute bottom-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
            <h1 class="text-white fw-bold display-5 mb-2">{{ $recipe->recipe_name }}</h1>
            <span class="badge bg-primary fs-6 px-3 py-2 me-2 shadow">
                <i class="fas fa-clock me-1"></i> {{ $recipe->cooking_time }} Minutes
            </span>
            <span class="badge bg-light text-dark fs-6 px-3 py-2 shadow">
                <i class="fas fa-calendar-alt me-1"></i> Added {{ $recipe->created_at->format('M d, Y') }}
            </span>
        </div>
    </div>

    <div class="card-body p-5">
        <div class="row">
            
            <div class="col-md-4 mb-4 mb-md-0 border-end-md pe-md-4">
                <h4 class="fw-bold text-success mb-3 pb-2 border-bottom">
                    <i class="fas fa-shopping-basket me-2"></i> Ingredients
                </h4>
                <div class="bg-light-subtle rounded p-3 text-dark">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </div>

            <div class="col-md-8 ps-md-4">
                <h4 class="fw-bold text-primary mb-3 pb-2 border-bottom">
                    <i class="fas fa-list-ol me-2"></i> Instructions
                </h4>
                <div class="text-dark fs-5 mb-4" style="line-height: 1.8;">
                    {!! nl2br(e($recipe->steps)) !!}
                </div>

                @if ($recipe->additional_notes)
                    <div class="mt-5 p-4 bg-warning-subtle border-start border-4 border-warning rounded">
                        <h5 class="fw-bold text-warning-emphasis mb-2">
                            <i class="fas fa-lightbulb me-2"></i> Chef's Notes
                        </h5>
                        <p class="mb-0 text-dark">
                            {!! nl2br(e($recipe->additional_notes)) !!}
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
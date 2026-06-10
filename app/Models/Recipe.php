<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Recipe extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'recipe_name',
        'recipe_image_path',
        'cooking_time',
        'ingredients',
        'steps',
        'additional_notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'ingredients' => 'array',
    ];
}

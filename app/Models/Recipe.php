<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}

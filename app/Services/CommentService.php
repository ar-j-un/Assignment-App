<?php
namespace App\Services;

use App\Models\Recipe;
use Illuminate\Support\Facades\Http;

class CommentService
{
    public function getComments(Recipe $recipe): array
    {
        return Http::get(
            'https://jsonplaceholder.typicode.com/comments',
            [
                'postId' => $recipe->id,
            ]
        )->json();
    }
}
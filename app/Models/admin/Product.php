<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
   protected $fillable = [
    'title',
    'description',
    'price',
    'stock',
    'image',
   ];

   public function categories(): BelongsTo
   {
    return $this->belongsTo(Category::class);
   }
}

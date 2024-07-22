<?php

namespace App\Models;

use view;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
   use HasFactory;

   protected $table = 'news';
   protected $fillable = [
      'title',
      'content',
      'category',
      'author',
      'slug',
   ];

   public function scopeFilter(Builder $query, array $filters): void
   {

      $query->when($filters['search'] ?? false, function ($query, $search) {
         $query->where('title', 'ilike', '%' . $search . '%')
            ->orWhere('content', 'ilike', '%' . $search . '%')
            ->whereHas('category', function ($query) use ($search) {
               $query->where('category_name', 'ilike', '%' . $search . '%');
            });
      });

      $query->when($filters['category'] ?? false, function ($query, $category) {
         $query->whereHas('category', function ($query) use ($category) {
            $query->where('category_name', $category);
         });
      });
   }

   public function category(): BelongsTo
   {
      return $this->belongsTo(Category::class);
   }
}

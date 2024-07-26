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
      'category_id',
      'user_id',
      'slug',
   ];



   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }


   public function scopeFilter(Builder $query, array $filters): void
   {

      $query->when($filters['search'] ?? false, function ($query, $search) {
         return $query->where('title', 'ilike', '%' . $search . '%')
            ->orWhere('content', 'ilike', '%' . $search . '%')
            ->orWhereHas('category', function ($query) use ($search) {
               $query->where('category_name', 'ilike', '%' . $search . '%');
            })
            ->orWhereHas('user', function ($query) use ($search) {
               $query->where('name', 'ilike', '%' . $search . '%');
            });
      });

      $query->when($filters['category'] ?? false, function ($query, $category) {
         return $query->whereHas('category', function ($query) use ($category) {
            $query->where('category_name', $category);
         });
      });


      $query->when($filters['author'] ?? false, function ($query, $user) {
         return $query->whereHas('user', function ($query) use ($user) {
            $query->where('name', $user);
         });
      });
   }
}

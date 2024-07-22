<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
   use HasFactory;
   protected $table = 'categories';
   protected $fillable = ['category_name'];

   public function scopeFilter(Builder $query): void
   {
      $query->where('category_name', 'ilike', '%' . request('search') . '%');
   }

   public function news(): HasMany
   {
      return $this->hasMany(News::class, 'category_id');
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   use HasFactory;
   protected $table = 'categories';
   protected $fillable = ['category_name'];

   public function scopeFilter(Builder $query): void
   {
      $query->where('category_name', 'like', '%' . request('search') . '%');
   }
}

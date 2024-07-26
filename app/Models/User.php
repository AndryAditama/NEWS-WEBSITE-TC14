<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use HasFactory;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $table = 'users';
   protected $fillable = [
      'name',
      'email',
      'email_verified_at',
      'role_id',
      'password',
   ];

   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
   protected function casts(): array
   {
      return [
         'email_verified_at' => 'datetime',
         'password' => 'hashed',
      ];
   }

   public function scopeFilter(Builder $query, array $filters): void
   {

      $query->when($filters['search'] ?? false, function ($query, $search) {
         $query->where('title', 'ilike', '%' . $search . '%')
            ->orWhereHas('role', function ($query) use ($search) {
               $query->where('role_name', 'ilike', '%' . $search . '%');
            });
      });
   }

   public function news()
   {
      return $this->hasMany(News::class, 'user_id');
   }

   public function role()
   {
      return $this->belongsTo(Role::class);
   }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
   /**
    * Define the model's default state.
    *
    * @return array<string, mixed>
    */
   public function definition(): array
   {
      return [
         'author_name' => fake()->name(),
         'username' => fake()->userName(),
         'email' => fake()->unique()->safeEmail(),
         'password' => Hash::make('password'),
         'email_verified_at' => now(),
         'remember_token' => Str::random(10),
      ];
   }
}

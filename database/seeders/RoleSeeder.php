<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      // Definisikan roles yang akan ditambahkan
      $roles = ['Admin', 'Penulis'];

      // Loop untuk menambahkan roles ke database
      foreach ($roles as $role) {
         Role::create(['role_name' => $role]);
      }
   }
}

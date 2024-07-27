<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {

      // Ambil role dari database
      $adminRole = Role::where('role_name', 'Admin')->first();
      $penulisRole = Role::where('role_name', 'Penulis')->first();

      // Definisikan roles yang akan ditambahkan
      User::factory()->create([
         'name' => 'Admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('123456'),
         'role_id' => $adminRole->id
      ]);

      User::factory()->create([
         'name' => 'Penulis',
         'email' => 'penulis@gmail.com',
         'password' => bcrypt('123456'),
         'role_id' => $penulisRole->id,
      ]);
   }
}

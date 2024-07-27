<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      $kategori = ['Olahraga', 'Pendidikan', 'Kesehatan', 'Keluarga', 'Hiburan', 'Kuliner'];

      // Loop untuk menambahkan roles ke database
      foreach ($kategori as $kat) {
         Category::create(['category_name' => $kat]);
      }
   }
}

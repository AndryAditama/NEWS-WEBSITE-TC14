<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
   public function index()
   {
      $rolename = Role::all();
      $totalBerita = News::count();
      $totalKategori = Category::count();
      $totalAuthor = User::count();
      return view('admin.home', ['title' => 'Halaman Home'],  compact('totalBerita', 'totalKategori', 'totalAuthor', 'rolename'));
   }

   public function indexAuthor()
   {
      $totalBerita = News::count();
      $totalKategori = Category::count();
      $totalAuthor = User::count();
      return view('admin.home', ['title' => 'Halaman Home'],  compact('totalBerita', 'totalKategori', 'totalAuthor'));
   }
}

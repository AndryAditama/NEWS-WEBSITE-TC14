<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
   public function index()
   {
      $data = News::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString();
      $kategori = Category::all();
      $beritaPopuler = News::limit(5)->get();

      // $data = $data->filter(function ($item) {
      //    return $item->user && $item->category;
      // });
      return view('/index', ['title' => 'Portal Berita'],  compact('data', 'kategori', 'beritaPopuler'));
   }

   public function showdetail(string $slug)
   {
      $kategori = Category::all();
      $detail = News::with(['category', 'user'])->where('slug', $slug)->first();
      return view('/detail', ['title' => 'Halaman Detail Berita'],  compact('detail', 'kategori'));
   }

   public function search()
   {
      $data = News::filter(request(['search', 'category', 'author']))->latest()->paginate(5)->withQueryString();
      $kategori = Category::all();
      $beritaPopuler = News::limit(5)->get();
      return view('/index', ['title' => 'Portal Berita'],  compact('data', 'kategori', 'beritaPopuler'));
   }
}

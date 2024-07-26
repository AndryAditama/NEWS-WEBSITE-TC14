<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $data = News::latest()->filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString();

      // $data = $data->filter(function ($item) {
      //    return $item->user && $item->category;
      // });
      return view('admin.news', ['title' => 'Halaman Berita'],  compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      $category = Category::all();
      $author = User::all();
      return view('admin.create-news', ['title' => 'Halaman Tambah Berita'],  compact('category', 'author'));
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {

      $validatedData = $request->validate([
         'title' => 'required',
         'konten' => 'required',
         'penulis' => 'required',
         'kategori' => 'required',
      ]);


      $slug = Str::slug($request->title);
      $count = News::where('slug', 'LIKE', "{$slug}%")->count();
      if ($count > 0) {
         $slug = "{$slug}-{$count}";
      }

      try {
         $data = new News(); // memanggil model
         $data->title = $request->input('title'); // inisiasi data dari input
         $data->content = $request->input('konten'); // inisiasi data dari input
         $data->category_id = $request->input('kategori'); // inisiasi data dari input
         $data->user_id = $request->input('penulis'); // inisiasi data dari input
         $data->slug = $slug; // inisiasi data dari input
         $data->save(); // menyimpan data
         return redirect()->Route('admin.news')->with('success', 'Berhasil menambahkan data'); // redirect ke halaman penulis
      } catch (\Throwable $th) {
         return redirect()->Route('admin.news')->with('error', $th->getMessage());
      }
   }

   /**
    * Display the specified resource.
    */
   public function show(string $slug)
   {
      $detail = News::with(['category', 'user'])->where('slug', $slug)->first();
      return view('admin.detail', ['title' => 'Halaman Detail Berita'],  compact('detail'));
   }



   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
      $data = News::find($id);
      $category = Category::all();
      $author = User::all();

      return view('admin.edit-news', ['title' => 'Halaman Edit Berita'],  compact('data', 'category', 'author'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
      $validatedData = $request->validate([
         'title' => 'required',
         'konten' => 'required',
         'penulis' => 'required',
         'kategori' => 'required',
      ]);


      $slug = Str::slug($request->title);
      $count = News::where('slug', 'LIKE', "{$slug}%")->count();
      if ($count > 0) {
         $slug = "{$slug}-{$count}";
      }

      try {

         $data = News::find($id); // memanggil model
         $data->title = $request->input('title'); // inisiasi data dari input
         $data->content = $request->input('konten'); // inisiasi data dari input
         $data->category_id = $request->input('kategori'); // inisiasi data dari input
         $data->user_id = $request->input('penulis'); // inisiasi data dari input
         $data->slug = $slug; // inisiasi data dari input
         $data->update(); // menyimpan data
         return redirect()->Route('admin.news')->with('success', 'Berita berhasil diupdate'); // redirect ke halaman penulis
      } catch (\Throwable $th) {
         return redirect()->Route('admin.news')->with('error', $th->getMessage());
      }
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {

      $data = News::find($id);
      $data->delete();
      return redirect()->Route('admin.news')->with('success', 'Berita Berhasil di hapus');
   }
}

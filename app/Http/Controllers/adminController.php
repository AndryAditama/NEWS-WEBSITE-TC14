<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mckenziearts\Notify\LaravelNotify;

class adminController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      // $data = Category::orderBy('category_name', 'asc')->paginate(5);
      // if (request('search')) {
      //    $data = Category::where('category_name', 'like', '%' . request('search') . '%')->paginate(5);
      // }
      $data = Category::filter()->latest()->paginate(5);
      return view('admin.category', ['title' => 'Halaman Kategori'],  compact('data'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      $request->validate([
         'kategori' => 'required|min:3|max:25',
      ], [
         'kategori.required' => 'Kategori tidak boleh kosong',
         'kategori.min' => 'Input minimal 3 karakter!',
         'kategori.max' => 'Input maksimal 25 karakter!',
      ]);

      $input = $request->input('kategori');

      $cek = Category::where('category_name', $input)->first();

      if ($cek) {
         return redirect()->Route('admin.category')->with('error', 'Kategori sudah ada');
      } else {

         $data = new Category(); // memanggil model
         $data->category_name = $request->input('kategori'); // inisiasi data dari input
         $data->save(); // menyimpan data
         return redirect()->Route('admin.category')->with('success', 'Kategori berhasil ditambahkan'); // redirect ke halaman kategori
      }
   }

   /**
    * Display the specified resource.
    */
   public function show(string $id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(string $id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, string $id)
   {
      $request->validate([
         'kategori' => 'required|min:3|max:25',
      ], [
         'kategori.required' => 'Kategori tidak boleh kosong',
         'kategori.min' => 'Input minimal 3 karakter!',
         'kategori.max' => 'Input maksimal 25 karakter!',
      ]);

      $input = $request->input('kategori');

      $cek = Category::where('category_name', $input)->first();
      if ($cek) {
         return redirect()->Route('admin.category')->with('error', 'Kategori sudah ada');
      } else {

         $data = Category::find($id); // membuat objek dari model
         $data->category_name = $request->input('kategori'); // inisiasi data dari input
         $data->update(); // menyimpan data
         return redirect()->Route('admin.category')->with('success', 'Kategori berhasil diubah'); // redirect ke halaman kategori
      }

      // $data = [
      //    'category_name' => $request->input('kategori'),
      // ];

      // Category::where('id', $id)->update($data);

      // return redirect()->Route('admin.category')->with('success', 'Kategori berhasil diubah');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      $data = Category::find($id);
      $data->delete();
      // Category::where('id', $id)->delete();
      return redirect()->Route('admin.category')->with('success', 'Kategori berhasil dihapus');
   }
}

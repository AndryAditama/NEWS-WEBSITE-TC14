<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class adminController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $data = Category::orderBy('category_name', 'asc')->get();
      return view('admin.category', ['title' => 'Halaman Kategori'], compact('data'));
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

      $data = [
         'category_name' => $request->input('kategori'),
      ];

      Category::create($data);
      return redirect()->Route('admin.category')->with('success', 'Kategori berhasil ditambahkan');
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

      $data = [
         'category_name' => $request->input('kategori'),
      ];

      Category::where('id', $id)->update($data);

      return redirect()->Route('admin.category')->with('success', 'Kategori berhasil diubah');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      Category::where('id', $id)->delete();
      return redirect()->Route('admin.category')->with('success', 'Kategori berhasil dihapus');
   }
}

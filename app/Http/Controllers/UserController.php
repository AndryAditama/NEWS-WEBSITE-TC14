<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      // query tabel users dan roles
      $data = User::with(['role'])->latest()->paginate(5);
      $role = Role::all();

      return view('admin.author', ['title' => 'Halaman Penulis'],  compact('data', 'role'));
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
         'name' => 'required|min:5|max:25',
         'email' => 'required|email|unique:users',
         'password' => 'required|min:6',
      ],);


      $data = new User(); // memanggil model
      $data->name = $request->input('name'); // inisiasi data dari input
      $data->email = $request->input('email'); // inisiasi data dari input
      $data->password = bcrypt($request->input('password')); // inisiasi data dari input
      $data->role_id = $request->input('role');  // inisiasi data dari input
      $data->save(); // menyimpan data
      return redirect()->Route('admin.author')->with('success', 'Berhasil menambahkan data'); // redirect ke halaman penulis
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

      $email = $request->input('email');
      $password = $request->input('password');

      $cek = User::where('email', $email)->first();

      try {
         if ($password == null) {
            if ($cek) {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->role_id = $request->input('role'); // inisiasi data dari input
               // $data->password = bcrypt($request->input('password')); // inisiasi data dari input
               $data->update(); // menyimpan data
               return redirect()->Route('admin.author')->with('success', 'Penulis berhasil diubah');
            } else {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->email = $request->input('email'); // inisiasi data dari input
               $data->role_id = $request->input('role'); // inisiasi data dari input
               // $data->password = bcrypt($request->input('password')); // inisiasi data dari input
               $data->update(); // menyimpan data
               return redirect()->Route('admin.author')->with('success', 'Penulis berhasil diubah'); // redirect ke halaman kategori
            }
         } else {

            if ($cek) {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->password = bcrypt($request->input('password')); // inisiasi data dari input
               $data->role_id = $request->input('role');
               $data->update(); // menyimpan data
               return redirect()->Route('admin.author')->with('success', 'Penulis berhasil diubah');
            } else {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->email = $request->input('email'); // inisiasi data dari input
               $data->password = bcrypt($request->input('password')); // inisiasi data dari input
               $data->role_id = $request->input('role');
               $data->update(); // menyimpan data
               return redirect()->Route('admin.author')->with('success', 'Penulis berhasil diubah'); // redirect ke halaman kategori
            }
         }
      } catch (\Throwable $th) {
         return redirect()->Route('admin.author')->with('error', 'Penulis gagal diubah. Terdapat Kesamaan Data');
      }
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(string $id)
   {
      $data = User::find($id);
      $news = News::where('category_id', $id)->get();
      // delete news
      foreach ($news as $key => $value) {
         $value->delete();
      }
      $data->delete();
      return redirect()->Route('admin.author')->with('success', 'Penulis berhasil dihapus');
   }

   public function setting()
   {
      // $data = User::find(Auth::user()->id);
      // dd($data);
      return view('/admin/settings', ['title' => 'Setting']);
   }

   public function updateSetting(Request $request, $id)
   {
      $email = $request->input('email');
      $password = $request->input('password');

      $cek = User::where('email', $email)->first();

      try {
         if ($password == null) {
            if ($cek) {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input

               $data->update(); // menyimpan data
               return redirect()->Route('admin.profil')->with('success', 'Penulis berhasil diubah');
            } else {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->email = $request->input('email'); // inisiasi data dari input

               $data->update(); // menyimpan data
               return redirect()->Route('admin.profil')->with('success', 'Penulis berhasil diubah'); // redirect ke halaman kategori
            }
         } else {

            if ($cek) {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->password = bcrypt($request->input('password')); // inisiasi data dari input

               $data->update(); // menyimpan data
               return redirect()->Route('admin.profil')->with('success', 'Penulis berhasil diubah');
            } else {
               $data = User::find($id); // membuat objek dari model
               $data->name = $request->input('name'); // inisiasi data dari input
               $data->email = $request->input('email'); // inisiasi data dari input
               $data->password = bcrypt($request->input('password')); // inisiasi data dari input

               $data->update(); // menyimpan data
               return redirect()->Route('admin.profil')->with('success', 'Penulis berhasil diubah'); // redirect ke halaman kategori
            }
         }
      } catch (\Throwable $th) {
         return redirect()->Route('admin.profil')->with('error', 'Penulis gagal diubah. Terdapat Kesamaan Data');
      }
   }
}

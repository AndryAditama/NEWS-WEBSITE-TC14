<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


   public function showLoginForm()
   {
      return view('/login', [
         'title' => 'Login'
      ]);
   }

   public function login(Request $request)
   {
      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
         $user = Auth::user();

         return redirect('/admin')->with('success', 'You have been logged in.');

         // // Arahkan pengguna ke halaman dashboard berdasarkan peran mereka
         // if ($user->role->role_name === 'admin') {
         //    return redirect()->intended('/admin');
         // } elseif ($user->role->role_name === 'penulis') {
         //    return redirect()->intended('/penulis');
         // }
      }

      return redirect('/login')->with('error', 'Invalid credentials.');
   }

   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/login')->with('success', 'You have been logged out.');
   }
}

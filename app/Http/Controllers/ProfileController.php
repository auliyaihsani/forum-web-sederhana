<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile()
    {
      // memanggil array dengan laravel
      $nama_depan = 'Sahabat';
      $nama_belakang ='Coding';
      $nama_lengkap = $nama_depan." " .$nama_belakang;
      $alamat = 'jakarta';
      $email = 'auliyaihsani@gmail.com';

      return view('profile')->with('nama_lengkap', $nama_lengkap)->with('alamat', $alamat)
      ->with('email', $email)->with('nama_depan', $nama_depan);
    }
}

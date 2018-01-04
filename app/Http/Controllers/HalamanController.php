<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function about()
    {
      return view('about');
    }

    public function contact()
    {
      return view('contact');
    }
}

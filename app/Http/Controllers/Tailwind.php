<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tailwind extends Controller
{
    public function index()
    {
        return view('tailwind/index');
    }
}

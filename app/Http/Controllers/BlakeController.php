<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlakeController extends Controller
{
    public function index()
    {
        return view('blake.index');
    }
}

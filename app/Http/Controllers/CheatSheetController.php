<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheatSheetController extends Controller
{
    public function index() {
        return view('cheats.index');
    }

    public function compile(Request $request) {
        dump($request);
    }
}

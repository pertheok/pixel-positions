<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LWController extends Controller
{
    public function index()
    {
        return view('lw.lw', [
            
        ]);
    }
}

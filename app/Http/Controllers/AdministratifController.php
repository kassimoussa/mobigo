<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratifController extends Controller
{
    public function index( ) {
        $level = session('level');
        return view($level.'.administratif.index');
    }
}

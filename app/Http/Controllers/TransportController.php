<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index( ) {
        $level = session('level');
        return view($level.'.transport.index');
    }
}
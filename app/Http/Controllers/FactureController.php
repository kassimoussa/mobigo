<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index( ) {
        $level = session('level');
        return view($level.'.factures.index');
    }
}

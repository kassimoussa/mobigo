<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index( ) {
        $level = session('level');
        return view($level.'.ecommerce.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index(){
        return view("2.medical.index");
    }
    public function rendezvous(){
        return view("2.medical.rendezvous");
    }
}

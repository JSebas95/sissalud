<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PpalController extends Controller
{
    public function index(){
      return view('ppal.pago.index');
    }
}

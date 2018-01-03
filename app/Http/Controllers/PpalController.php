<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PpalController extends Controller
{
    public function index(Request $request){
      if($request){
        $query=$request->get('searchText');
        if(is_null($query)){
          $cliente=Cliente::all();
        }else{
          $user_id=Cliente::where('cc',$query)->get();
        }
      }
      return view('ppal.pago.index');
    }
}

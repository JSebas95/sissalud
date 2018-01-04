<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cliente;
use Session;

class PpalController extends Controller
{
    public function index(Request $request){
      if($request){
        $query=$request->get('searchText');
        if(is_null($query)){
          $cliente=Cliente::all();
        }else{
          $cliente=Cliente::where('cc',$query)->get();
        }
      }
      return view('ppal.pago.index',["cliente"=>$cliente,"searchText"=>$query]);
    }

    public function show($id){
      $cliente = Cliente::where('cc', $id)->get();

        return view("ppal.pago.show",["cliente"=>$cliente]);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use Session;
use PDF;
use App\Pago;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;


use App\Http\Controllers\Controller;

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

    public function stores($id, Request $request){
      $cliente = Cliente::where('id_user', $id)->first();
      $pago= new Pago;
      $pago->nombre=$cliente->nombre;
      $pago->apellido=$cliente->apellido;
      $pago->cc=$cliente->cc;
      $pago->valor=$request->get('total');
      $mytime = Carbon::now('America/Bogota');
      $pago->creacion=$mytime->toDateTimeString();
      //$pdf = PDF::loadView('ppal/pago/pdf',compact('pago'));
      $pago->save();

      $clientes=Cliente::where('id_user',$id)->get();

       $pdf = PDF::loadView('ppal.pago.pdf',compact('clientes'));
       return $pdf->download('ss.pdf');


      //return $pdf->download('ss.pdf');

    }

    public function downloadPDF($id){

          $cliente=Cliente::where('id_user',$id)->get();

           $pdf = PDF::loadView('ppal.pago.pdf',compact('cliente'));
           return $pdf->download('ss.pdf');

}


}

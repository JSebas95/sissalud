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

class PagoController extends Controller
{
    public function index(Request $request){
      if($request){
        $query=$request->get('searchText');
        if(is_null($query)){
          $pago= Pago::orderBy('id_pago','desc')->get();
        }else{
          $cliente=Cliente::where('cc',$query)->first()->id_user;
          $pago=Pago::where('id_user',$cliente)->get();
        }
      }
      return view('ppal.factura.index',["pago"=>$pago,"searchText"=>$query]);
    }

    public function imprimirPDF($id){

      $pago=Pago::where('id_pago',$id)->get();

       $pdf = PDF::loadView('ppal.factura.pdf',compact('pago'));
       return $pdf->download('Factura.pdf');

    }


}
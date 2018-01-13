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




    public function show(){
        $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
        $pago=Pago::orderBy('creacion','desc')->whereDate('creacion','>=',$one_month_ago)->get();
        $total_pagado=0;
        foreach ($pago as $pag) {
          $total_pagado += $pag->valor;
        }
        return view('ppal.factura.show',compact('pago','total_pagado'));

    }

    public function imprimereporte(){
      $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
      $pago=Pago::orderBy('creacion','desc')->whereDate('creacion','>=',$one_month_ago)->get();
      $total_pagado=0;
      foreach ($pago as $pag) {
        $total_pagado += $pag->valor;
      }
      $pdf = PDF::loadView('ppal.factura.pdfreporte',compact('pago','total_pagado'));
      return $pdf->download('Reporte.pdf');

    }




}

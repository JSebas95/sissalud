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

  public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
      if($request){
        $query=$request->get('searchText');
        if(is_null($query)){
          $pago= Pago::orderBy('id_pago','desc')->get();
        }else{
          $cliente=Cliente::where('cc',$query)->orWhere('nombre',$query)->orWhere('apellido',$query)->first()->id_user;
          $pago=Pago::where('id_user',$cliente)->orWhere('id_pago',$query)->get();
        }
      }
      return view('ppal.factura.index',["pago"=>$pago,"searchText"=>$query]);
    }

    public function imprimirPDF($id){
      $pago=Pago::where('id_pago',$id)->get();
       $pdf = PDF::loadView('ppal.factura.pdf',compact('pago'));
       $pdf->setPaper(array(0, 0, 125, 600),"portrait");
       return $pdf->download('Factura.pdf');
}

    public function show(Request $request){
      if($request){
        $mes=$request->get('mes');
        //$query=$request->get('searchText');
        $mesactual=Carbon::now();
        if(is_null($mes)){
          $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
          $pago=Pago::orderBy('creacion','desc')->whereDate('creacion','>=',$one_month_ago)->get();
          $total_pagado=0;
          foreach ($pago as $pag) {
            $total_pagado += $pag->valor;
          }
        }else{
          $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=',$mes)->get();
          $total_pagado=0;
          foreach ($pago as $pag) {
            $total_pagado += $pag->valor;
          }
        }
    }
        return view('ppal.factura.show',['pago'=>$pago,'total_pagado'=>$total_pagado]);

    }

    public function imprimereporte(Request $request){
      $mes=$request->get('mes');

      $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
      $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=',$mes)->get();
      $total_pagado=0;
      foreach ($pago as $pag) {
        $total_pagado += $pag->valor;
      }
      $pdf = PDF::loadView('ppal.factura.pdfreporte',compact('pago','total_pagado','mes'));
      return $pdf->download('Reporte.pdf');

    }

    public function nopago(){
      $cliente=Cliente::where('estado','Inactivo')->get();
      return view('ppal.factura.nopago',['cliente'=>$cliente]);

    }




}

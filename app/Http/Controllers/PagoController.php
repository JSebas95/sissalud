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
       $pdf->setPaper(array(0, 0, 125, 600),"portrait");
       return $pdf->download('Factura.pdf');
}

    public function show(Request $request){
      if($request){
        $query=$request->get('searchText');
        if(is_null($query)){
          $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
          $pago=Pago::orderBy('creacion','desc')->whereDate('creacion','>=',$one_month_ago)->get();
          $total_pagado=0;
          foreach ($pago as $pag) {
            $total_pagado += $pag->valor;
          }
        }else{
          if($query=="Enero"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','01')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Febrero"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','02')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Marzo"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','03')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Abril"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','04')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Mayo"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','05')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Junio"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','06')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Julio"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','07')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Agosto"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','08')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Septiembre"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','09')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Octubre"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','10')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Noviembre"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','11')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }elseif($query=="Diciembre"){
            $pago=Pago::orderBy('creacion','desc')->whereMonth('creacion','=','12')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }

          }else{
            $pago=Pago::orderBy('creacion','desc')->get();
            $total_pagado=0;
            foreach ($pago as $pag) {
              $total_pagado += $pag->valor;
            }
          }
        }



    }
        return view('ppal.factura.show',['pago'=>$pago,'total_pagado'=>$total_pagado,'searchText'=>$query]);

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

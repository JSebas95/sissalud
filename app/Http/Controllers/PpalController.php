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
          $cliente=Cliente::orderBy('estado','Activo')->get();
        }else{
          $cliente=Cliente::where('cc',$query)->orWhere('nombre',$query)->orWhere('apellido',$query)->get();
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
      $pago->id_user=$cliente->id_user;
      $pago->valor=$request->get('total');
      $mytime = Carbon::now('America/Bogota');
      $pago->creacion=$mytime->toDateTimeString();
      //$pdf = PDF::loadView('ppal/pago/pdf',compact('pago'));
      $pago->save();


      return redirect('ppal/factura');
    }


    public function create(){
      return view("ppal.cliente.create");

    }

    public function store(Request $request){
      $cliente=New Cliente();
      $cliente->nombre=$request->nombre;
      $cliente->apellido=$request->apellido;
      $cliente->cc=$request->cc;
      $cliente->telefono=$request->telefono;
      $cliente->estado="Activo";
      $cliente->save();
      return redirect('ppal/pago');
    }









}

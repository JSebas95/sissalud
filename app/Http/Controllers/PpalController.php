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
use Mail;
use App\Mail\confirmapago;


use App\Http\Controllers\Controller;

class PpalController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
      if($request){
        $query=trim($request->get('searchText'));
        $cliente=DB::table('Cliente')
        ->select('nombre','apellido','cc','telefono','correo','estado')
        ->where('nombre','LIKE','%'.$query.'%')
        ->orwhere('apellido','LIKE','%'.$query.'%')
        ->orwhere('cc','LIKE','%'.$query.'%')
        ->get();
      }
      return view('ppal.pago.index',["cliente"=>$cliente,"searchText"=>$query]);

    }


    /*if($request){
      $query=$request->get('searchText');
      if(is_null($query)){
        $cliente=Cliente::orderBy('estado','Activo')->get();
      }else{
        $cliente=Cliente::where('cc',$query)->orWhere('nombre',$query)->orWhere('apellido',$query)->get();
      }
    }
    return view('ppal.pago.index',["cliente"=>$cliente,"searchText"=>$query]);*/



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
      $pago->pension=$request->get('pagarpension');
      $pago->arl=$request->get('pagararl');
      $pago->salud=$request->get('pagarsalud');
      //$pdf = PDF::loadView('ppal/pago/pdf',compact('pago'));
      //Mail::to($cliente->correo)->send(new confirmapago($pago));
      $pago->save();



      return redirect('ppal/factura');
    }

    public function create(){
      return view("ppal.cliente.create");
    }

    public function edit($id){
      $cliente=Cliente::where('cc',$id)->first();
      return view('ppal.pago.edit',["cliente"=>$cliente]);
    }

    public function update($id, Request $request){
      $cliente= Cliente::findOrFail($id);
      $cliente->nombre=$request->get('nombre');
      $cliente->apellido=$request->get('apellido');
      $cliente->cc=$request->get('cc');
      $cliente->telefono=$request->get('telefono');
      $cliente->estado=$request->get('estado');
      $cliente->update();
      return redirect('ppal/pago');

    }

    public function store(Request $request){
      $cliente=New Cliente();
      $cliente->nombre=$request->nombre;
      $cliente->apellido=$request->apellido;
      $cliente->cc=$request->cc;
      $cliente->telefono=$request->telefono;
      $cliente->correo=$request->correo;
      $cliente->estado="Activo";
      $cliente->save();
      return redirect('ppal/pago');
    }









}

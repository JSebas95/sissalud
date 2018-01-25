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
use Illuminate\Support\Str;
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
      $date = Carbon::now('America/Bogota');
      $cliente=Cliente::all();
      if($date->format('d')==22){
        foreach ($cliente as $cli) {
          $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
          $fechacliente=$cli->ultimo_pago;
          if($fechacliente >= $one_month_ago){
            $estadoactual=Cliente::where('cc',$cli->cc)->update(['estado' => "Activo"]);
          }else{
            $estadoactual=Cliente::where('cc',$cli->cc)->update(['estado' => "Inactivo"]);
          }}
      }
      $query=trim($request->get('searchText'));
      if(is_null($request)){
        $cliente=Cliente::orderBy('estado','Activo')->get();
      }else{
        $cliente=DB::table('Cliente as c')
        ->select('c.id_user','c.nombre','c.apellido','c.cc','c.telefono','c.correo','c.ultimo_pago','c.estado')
        ->where('nombre','LIKE','%'.$query.'%')
        ->orwhere('apellido','LIKE','%'.$query.'%')
        ->orwhere('cc','LIKE','%'.$query.'%')
        ->get();
      }
      return view('ppal.pago.index',["cliente"=>$cliente,"searchText"=>$query,"date"=>$date]);
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
      $cliente=Cliente::where('id_user',$id)->first();
      $pago=Pago::where('id_user',$id)->orderBy('creacion','DESC')->take(1)->first();

        return view("ppal.pago.show",["pago"=>$pago,"cliente"=>$cliente]);

    }

    public function stores($id, Request $request){
      $cliente = Cliente::where('id_user', $id)->first();
      $cliente->estado="Activo";
      $pago= new Pago;
      $pago->id_user=$cliente->id_user;
      $pago->valor=$request->get('total');
      $pago->concepto=$request->get('concepto');
      $mytime = Carbon::now('America/Bogota');
      //$mytime= $mytime->format('d-m-Y');
      $pago->creacion=$mytime;
      $pago->save();

      $ultimo_pago=Pago::where('id_user',$id)->orderBy('creacion','DESC')->first();
      $cliente->ultimo_pago=$mytime;
      $cliente->update();



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
      $cliente->nombre=Str::upper($request->get('nombre'));
      $cliente->apellido=Str::upper($request->get('apellido'));
      $cliente->cc=$request->get('cc');
      $cliente->telefono=$request->get('telefono');
      $cliente->estado=$request->get('estado');
      $cliente->tipo_usuario=Str::upper($request->get('tipo_usuario'));
      $cliente->empresa=Str::upper($request->get('empresa'));
      $cliente->eps=Str::upper($request->get('eps'));
      $cliente->arp=Str::upper($request->get('arp'));
      $cliente->pension=Str::upper($request->get('pension'));
      $cliente->observaciones=$request->observaciones;
      $cliente->update();
      return redirect('ppal/pago');

    }

    public function store(Request $request){
      $cliente=New Cliente();
      $cliente->nombre=Str::upper($request->nombre);
      $cliente->apellido=Str::upper($request->apellido);
      $cliente->cc=$request->cc;
      $cliente->telefono=$request->telefono;
      $cliente->correo=Str::upper($request->correo);
      $mytime = Carbon::now('America/Bogota');
      $cliente->ultimo_pago=$mytime;
      $cliente->estado="Activo";
      $cliente->tipo_usuario=Str::upper($request->tipo_usuario);
      $cliente->fecha_afiliacion=$mytime;
      $cliente->eps=Str::upper($request->eps);
      $cliente->arp=Str::upper($request->arp);
      $cliente->pension=Str::upper($request->pension);
      $cliente->empresa=Str::upper($request->empresa);
      $cliente->observaciones=$request->observaciones;
      $cliente->save();

      $pago= new Pago;
      $ultimo_cliente=Cliente::orderBy('id_user','DESC')->take(1)->first();
      $pago->id_user=$ultimo_cliente->id_user;
      $pago->valor="50000";
      $mytime = Carbon::now('America/Bogota');
      $pago->creacion=$mytime;
      $pago->save();


      return redirect('ppal/factura');
    }









}

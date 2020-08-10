<?php

namespace App\Http\Controllers;

use App\Alambre;
use App\Cliente;
use App\Cotizacion;
use App\Malla;
use Illuminate\Http\Request;

class CotizadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mallas=Malla::get();
        $alambres=Alambre::get();
        $clientes=Cliente::get();
        return view('cotizador.index',compact('mallas','alambres','clientes'));
    }
    public function create()
    {

    }
    protected function validar(Request $request){
        $this->validate($request,[
            'cliente_id' =>'required|min:1',            
            'cantidad' => 'required|integer|min:1|max:500|',
        ]);
    }
    protected function validarMAL(Request $request){
        $this->validate($request,[
            'alto' => 'required|numeric|min:0.4|max:2|',
            'largo' => 'required|numeric|min:2|max:200|',
        ]);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validar($request);
        $datos=$request->all();
        if(isset($datos['malla_id'])) {
            
            $cliente=Cliente::find($datos['cliente_id']);
            $malla = Malla::find($datos['malla_id']);
            if($malla->tipoMalla=='olimpica'){
                $this->validarMAL($request);
                $datos['mcuadrados'] = $datos['alto'] * $datos['largo'];
                $datos['precioUnit'] = round($datos['mcuadrados'] * $malla->precio,1);
                $cotizacion['descripcion']='Malla '.$malla['tipoMalla'].' -- Dimension: '.$datos['alto'].'m x '.$datos['largo'].'m -- Metros cuadrados: '.$datos['mcuadrados'].'m2 -- Celda: '.$malla['celda'].' cm -- Alambre: '.$malla['alambre'];
            }
            else{
                $datos['mcuadrados'] = $malla['alto'] * $malla['largo'];
                $datos['precioUnit'] = $malla->precio;
                $cotizacion['descripcion']='Malla '.$malla['tipoMalla'].' -- Dimension: '.$malla['alto'].'m x '.$malla['largo'].'m -- Metros cuadrados: '.$datos['mcuadrados'].'m2 -- Celda: '.$malla['celda'].' cm -- Alambre: '.$malla['alambre'];
            }
            $datos['precioTotal'] = round($datos['precioUnit'] * $datos['cantidad'],1);

            
            $cotizacion['cantidad']=$datos['cantidad'];
            $cotizacion['precioU']=$datos['precioUnit'];
            $cotizacion['cliente_id']=$cliente->id;

            Cotizacion::create($cotizacion);
            $cotizacion=Cotizacion::get()->last();

            return view('cotizador.show', compact('malla', 'datos','cliente','cotizacion'));
        }
        else{
            $cliente=Cliente::find($datos['cliente_id']);
            $alambre = Alambre::find($datos['alambre_id']);
            $datos['precioUnit'] = $alambre->precio;
            $datos['precioTotal'] = round($datos['precioUnit'] * $datos['cantidad'],1);

            $cotizacion['descripcion']='Alambre '.$alambre['tipoAlambre'].' -- Numero: '.$alambre['awg'].' -- Peso: '.$alambre['peso'].'Kg -- Descripcion: '.$alambre['descripcion'];
            $cotizacion['cantidad']=$datos['cantidad'];
            $cotizacion['precioU']=$datos['precioUnit'];
            $cotizacion['cliente_id']=$cliente->id;
            Cotizacion::create($cotizacion);
            $cotizacion=Cotizacion::get()->last();

            return view('cotizador.show', compact('alambre', 'datos','cliente','cotizacion'));
        }
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function cMalla(Request $request){
        $datos=$request->all();
        $malla=Malla::find($datos['malla_id']);
        $cliente=Cliente::find($datos['cliente_id']);
        $cotizacion=Cotizacion::find($datos['cotizador_id']);
        return view('cotizador.cMallaAlambre',compact('datos','malla','cliente','cotizacion'));
    }
    public function cAlambre(Request $request){
        $datos=$request->all();
        $alambre=Alambre::find($datos['alambre_id']);
        $cliente=Cliente::find($datos['cliente_id']);
        $cotizacion=Cotizacion::find($datos['cotizador_id']);
        return view('cotizador.cMallaAlambre',compact('datos','alambre','cliente','cotizacion'));
    }
}

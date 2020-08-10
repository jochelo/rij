<?php

namespace App\Http\Controllers;

use App\Malla;
use App\OrdenMalla;
use Illuminate\Http\Request;

class OrdenMallaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    protected function validar(Request $request){
        $this->validate($request,[
            'cantidad' => 'required|integer|min:1|max:500|',
        ]);
    }
    protected function validarAL(Request $request){
        $this->validate($request,[
            'alto' => 'required|numeric|min:0.4|max:3|',
            'largo' => 'required|numeric|min:2|max:200|',
        ]);
    }
    public function store(Request $request)
    {
        $this->validar($request);
        $datos=$request->all();
        $malla=Malla::find($datos['malla_id']);
        if($malla['tipoMalla'] == 'olimpica' ){
            $this->validarAL($request);
            $datos['precio']=round(($datos['alto']*$datos['largo'])*$malla['precio'],1);
        }
        else
            $datos['precio']=round($malla['precio'],1);   
        //dd($datos);
        OrdenMalla::create($datos);
        return redirect('pedidos/'.$datos['pedido_id'].'/ordenes/');

    }
    public function show($id)
    {
        //
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
        $ordenMalla=OrdenMalla::find($id);
        $datos['pedido_id']=$ordenMalla->pedido_id;
        $ordenMalla->delete();
        return redirect('pedidos/'.$datos['pedido_id'].'/ordenes/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Alambre;
use App\OrdenAlambre;
use Illuminate\Http\Request;

class OrdenAlambreController extends Controller
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
            'cantidad' => 'required|numeric|min:1|max:500|',
        ]);
    }
    public function store(Request $request)
    {
        $this->validar($request);
        $datos=$request->all();

        $alambre=Alambre::find($datos['alambre_id']);
        $datos['precio']=round($alambre['precio'],1);
        //dd($datos);
        OrdenAlambre::create($datos);
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
        $ordenAlambre=OrdenAlambre::find($id);
        $datos['pedido_id']=$ordenAlambre->pedido_id;
        $ordenAlambre->delete();
        return redirect('pedidos/'.$datos['pedido_id'].'/ordenes/');        
    }
}

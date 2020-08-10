<?php

namespace App\Http\Controllers;

use App\Alambre;
use App\Cliente;
use App\Malla;
use App\OrdenAlambre;
use App\OrdenMalla;
use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pedidos=Pedido::get();
        return view('pedido.index',compact('pedidos'));
    }
    public function create()
    {

    }
    protected function validarF(Request $request){
        $this->validate($request,[
            'fecha' => 'required|date|',
        ]);
    }
    protected function validarT(Request $request){
        $this->validate($request,[
            'total' => 'required|numeric|',
            'cancelado' => 'required|numeric|',
        ]);
    }
    protected function validarC(Request $request){
    $this->validate($request,[
        'ingreso' => 'required|numeric|',
    ]);
}
    public function store(Request $request)
    {
        $this->validarF($request);
        $datos=$request->All();

        $mallas=Malla::get();
        $alambres=Alambre::get();

        if(sizeof($mallas)!=0 || sizeof($alambres)!=0) {
            Pedido::create($datos);
            $pedido = Pedido::where('total', '=', 0)
                ->where('fecha', '=', $datos['fecha'])
                ->where('cliente_id', '=', $datos['cliente_id'])->get()->last();
            return redirect('pedidos/' . $pedido['id'] . '/ordenes/');
        }
        else{
            $cliente=Cliente::find($datos['cliente_id']);
            $dat['sw']=1;
            return view('pedido.create',compact('cliente','dat'));
        }
    }
    public function show($id)
    {
        $pedido=Pedido::find($id);
        return view('pedido.show',compact('pedido'));
    }
    public function edit($id)
    {
        $pedido=Pedido::find($id);
        return view('pedido.edit',compact('pedido'));
    }
    public function update(Request $request, $id)
    {

        $pedido = Pedido::find($id);
        if(isset($request->ingreso)) {
            $this->validarC($request);
            $dato['cancelado']=round($pedido->cancelado+$request->ingreso,1);
            if($dato['cancelado']>=$pedido['total'])
                $dato['estado']=true;
            $pedido->update($dato);
        }
        else {
            $this->validarT($request);
            $tot=round($request['total'],1);
            $can=round($request['cancelado'],1);
            $request['total']=$tot;
            $request['cancelado']=$can;
            if($request['cancelado']>=$request['total'])
                $request['estado']=true;
            $pedido->update($request->all());
        }
        return redirect('/pedidos');
    }
    public function destroy($id)
    {
        $pedido=Pedido::find($id);
        $pedido->delete();
        return redirect('/pedidos');
    }
    public function inicio(){
        $clientes=Cliente::get();
        return view('pedido.inicio',compact('clientes'));
    }
    public function crear($id){
        $cliente=Cliente::find($id);
        return view('pedido.create',compact('cliente'));
    }
    public function ordenMalla($pedido_id,$malla_id){
        $datos['pedido_id']=$pedido_id;
        $datos['malla_id']=$malla_id;
        $malla=Malla::find($malla_id);
        return view('orden.create-ordenMalla',compact('datos','malla'));
    }
    public function ordenAlambre($pedido_id,$alambre_id){
        $datos['pedido_id']=$pedido_id;
        $datos['alambre_id']=$alambre_id;
        $alambre=Alambre::find($alambre_id);
        return view('orden.create-ordenAlambre',compact('datos','alambre'));
    }
    public function ordenes($id)
    {
        $alambres=Alambre::get();
        $mallas=Malla::get();
        $datos=Pedido::find($id);

        $ordenMallas=OrdenMalla::where('pedido_id','=',$id)->get();
        $ordenAlambres=OrdenAlambre::where('pedido_id','=',$id)->get();
        //dd($datos);
        return view('orden.index',compact('alambres','mallas','datos','ordenMallas','ordenAlambres'));
    }
}

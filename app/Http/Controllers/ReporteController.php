<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function inicioG()
    {
        return view('reporte.inicio-graficos');
    }
    protected function validar(Request $request){
        $this->validate($request,[
            'anio' =>'required|numeric|min:2000|max:3000',
            'mes' => 'required|numeric|min:1|max:12',
            'nMes' => 'required|numeric|min:1|max:600',
        ]);
    }
    public function storeG(Request $request)
    {
        $this->validar($request);
        $datos=$request->all();
        $dateIni=date_format(date_create_from_format('Y-m-d',$datos['anio']."-".$datos['mes']."-1"),'Y-m-d');

        $addA=intdiv($datos['mes']+$datos['nMes'],12);
        $addM=($datos['mes']+$datos['nMes'])%12;
        $datos['anioU']=$datos['anio']+$addA;
        $datos['mesU']=$addM;
        $dateFin=date_format(date_create_from_format('Y-m-d',$datos['anioU']."-".$datos['mesU']."-1"),'Y-m-d');

        ///MALLA MAS VENDIDA (cantidad)
        $mallas=DB::table('mallas')

            ->join('orden_mallas','mallas.id','=','orden_mallas.malla_id')
            ->join('pedidos','orden_mallas.pedido_id','=','pedidos.id')
            ->where('pedidos.fecha','>=',$dateIni)
            ->where('pedidos.fecha','<',$dateFin)
            ->select('mallas.*',DB::raw('sum(orden_mallas.cantidad) as sum'))
            ->groupBy('mallas.id')
            ->orderBy('sum','desc')
            ->get();
//        dd($mallas);
        ///ALAMBRE MAS VENDIDA (cantidad)
        $alambres=DB::table('alambres')

            ->join('orden_alambres','alambres.id','=','orden_alambres.alambre_id')
            ->join('pedidos','orden_alambres.pedido_id','=','pedidos.id')
            ->where('pedidos.fecha','>=',$dateIni)
            ->where('pedidos.fecha','<',$dateFin)
            ->select('alambres.*',DB::raw('sum(orden_alambres.cantidad) as sum'))
            ->groupBy('alambres.id')
            ->orderBy('sum','desc')
            ->get();
        ///CLIENTE POTENCIAL->cliente que cancelo sus deudas y genero mayor ingreso a la empresa
        $clientePot=DB::table('clientes')
            ->join('pedidos','clientes.id','=','pedidos.cliente_id')
            ->where('pedidos.fecha','>=',$dateIni)
            ->where('pedidos.fecha','<',$dateFin)
            ->where('pedidos.estado','=',true)
            ->whereNull('pedidos.deleted_at')
            ->select('clientes.*',DB::raw('sum(pedidos.total) as sum'))
            ->groupBy('clientes.id')
            ->orderBy('sum','desc')
            ->get();

        ///CLIENTE DEUDOR->cliente que NO cancelo sus deudas y las mismas son muy elevadas
        $clienteDeu=DB::table('clientes')
            ->join('pedidos','clientes.id','=','pedidos.cliente_id')
            ->where('pedidos.fecha','>=',$dateIni)
            ->where('pedidos.fecha','<',$dateFin)
            ->where('pedidos.estado','=',false)
            ->whereNull('pedidos.deleted_at')
            ->select('clientes.*',DB::raw('sum(pedidos.total-pedidos.cancelado) as sum'))
            ->groupBy('clientes.id')
            ->orderBy('sum','desc')
            ->get();

        return view('reporte.index-graficos',compact('datos','mallas','alambres','clientePot','clienteDeu'));
    }
    public function inicioR()
    {
        return view('reporte.inicio-reporte');
    }
    public function storeR(Request $request)
    {
        $this->validar($request);
        $datos = $request->all();
        $dateIni = date_format(date_create_from_format('Y-m-d', $datos['anio'] . "-" . $datos['mes'] . "-1"), 'Y-m-d');

        $addA = intdiv($datos['mes'] + $datos['nMes'], 12);
        $addM = ($datos['mes'] + $datos['nMes']) % 12;
        $datos['anioU'] = $datos['anio'] + $addA;
        $datos['mesU'] = $addM;
        $dateFin = date_format(date_create_from_format('Y-m-d', $datos['anioU'] . "-" . $datos['mesU'] . "-1"), 'Y-m-d');
        return redirect(route('storeRep',['fei'=>$dateIni,'fef'=>$dateFin]));
    }
    public function storeRep($fei,$fef){
        $datos['fei']=$fei;
        $datos['fef']=$fef;
        return view('reporte.index-reporte',compact('datos'));
    }
    public function clientePot($fei,$fef){
        ///CLIENTE POTENCIAL->cliente que cancelo sus deudas y genero mayor ingreso a la empresa
        $clientePot=DB::table('clientes')
            ->join('pedidos','clientes.id','=','pedidos.cliente_id')
            ->where('pedidos.fecha','>=',$fei)
            ->where('pedidos.fecha','<',$fef)
            ->where('pedidos.estado','=',true)
            ->whereNull('pedidos.deleted_at')
            ->select('clientes.*',DB::raw('sum(pedidos.total) as ingreso'),DB::raw('count(pedidos.id) as npedidos'))
            ->groupBy('clientes.id')
            ->orderByRaw('ingreso DESC, npedidos DESC')
            ->get();
        //dd($clientePot);
        $datos['fei']=$fei;
        $datos['fef']=$fef;
        return view('reporte.show-clientePot',compact('clientePot','datos'));
    }
    public function clienteTime(){
        ///CLIENTE PAGOS->tiempo en el que el cliente cancelo sus deudas y si las cancelo
        ///clientes que pagan a plazos y cancelaron toda la deuda
        //$fa=date("Y-m-d");
        $ped_plazos=DB::table('pedidos')
            ->join('clientes','pedidos.cliente_id','=','clientes.id')
            ->whereNotNull('pedidos.updated_at')
            ->whereNull('pedidos.deleted_at')
            ->whereNull('clientes.deleted_at')
            ->select('pedidos.*','clientes.nombres','clientes.apellidos')
            ->orderByRaw('pedidos.estado DESC')
            ->get();
        //$dat['fa']=$fa;
        //dd($ped_plazos);
        return view('reporte.show-pedidos',compact('ped_plazos'));
    }
    public function ingresoCli($fei,$fef){
        $ingresos=Pedido::
        where('fecha','>=',$fei)
            ->where('fecha','<',$fef)
            ->orderByRaw('estado DESC, fecha ASC')
            ->get();
        $datos['fei']=$fei;
        $datos['fef']=$fef;
        return view('reporte.show-ingresos',compact('ingresos','datos'));
    }

}

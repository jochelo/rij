<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['create','store']]);
    }
    public function index()
    {
        $reservas=Reserva::get();
        return view('reserva.index',compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reserva');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validar(Request $request){
        $this->validate($request,[
            'nombre' => 'required|max:100',
            'detalle' => 'required|max:255',
        ]);
    }
    public function store(Request $request)
    {
        
        $this->validar($request);
        $reserva=$request->all();
        
        Reserva::create($reserva);
        return redirect('/reservas/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva=Reserva::find($id);
        return view('reserva.show',compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva=Reserva::find($id);
        $reserva->delete();
        return redirect('/reservas');
    }
    public function updateP(Request $request,$id){
        if($request->ajax()){
            $dato=$request->all();
            if(isset($dato['modificar'])){
                $estado='recepcionado';
            }
            else{
                $estado='espera';
            }
            
            $reserva=Reserva::find($id);
            $reserva['estado']=$estado;
            $reserva->save();
            
            return response()->json([
                'estado'=>$estado
            ]);
        }
    }
}

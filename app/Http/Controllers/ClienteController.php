<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clientes=Cliente::get();
        return view('cliente.index',compact('clientes'));
    }
    public function create()
    {
        return view('cliente.create');
    }
    protected function validar(Request $request){
        $this->validate($request,[
            'nombres' => 'required|max:25',
            'apellidos' => 'required|max:25',
            'direccion' => 'required|max:225',
            'celular' => 'required|digits_between:8,12',
            'detalle' => 'required|max:255',
        ]);
    }
    public function store(Request $request)
    {
        $this->validar($request);

        Cliente::create($request->All());
        if($request['url']== url('/clientes'))
            return redirect('clientes/');
        else
            return redirect('inicio/');
    }
    public function show($id)
    {
        $cliente=Cliente::find($id);
        return view('cliente.show',compact('cliente'));
    }
    public function edit($id)
    {
        $cliente=Cliente::find($id);
        return view('cliente.edit',compact('cliente'));
    }
    public function update(Request $request, $id)
    {
        $this->validar($request);
        $cliente=Cliente::find($id);
        $cliente->update($request->All());
        return redirect('clientes/');
    }
    public function destroy($id)
    {
        $cliente=Cliente::find($id);
        $cliente->delete();
        return redirect('clientes/');
    }
}

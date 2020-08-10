<?php

namespace App\Http\Controllers;

use App\Malla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MallaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mallas=Malla::get();
        return view('malla.index',compact('mallas'));
    }
    public function create()
    {
        return view('malla.create');
    }
    protected function validar(Request $request){
        $this->validate($request,[
            'fotoMalla' => 'image',
            'tipoMalla' => 'required|in:hexagonal,olimpica,quinua,ganadera',
            'precio' => 'required|numeric|min:0.1|max:1500|',
            'descripcion' => 'max:255',
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
        //dd($request);
        $this->validar($request);
        $malla = $request->All();
        if($malla['tipoMalla'] != 'olimpica' ){
            $this->validarAL($request);
        }
        if(isset($malla['fotoMalla'])) {
            $img = $request->file('fotoMalla');
            $nomimg = time() . '_' . $img->getClientOriginalName();
            Storage::disk('s3')->put('rij/imgProd/'.$nomimg, file_get_contents($img->getRealPath()),'public');

            $malla['fotoMalla'] = env('AWS_URL').'/rij/imgProd/'.$nomimg;
        }
        if(!isset($malla['descripcion'])){
            unset($malla['descripcion']);
        }
        $pre=$malla['precio'];
        $malla['precio']=$pre;

        Malla::create($malla);
        return redirect('mallas/');
    }
    public function show($id)
    {
        $malla=Malla::find($id);
        return view('malla.show',compact('malla'));
    }
    public function edit($id)
    {
        $malla=Malla::find($id);
        return view('malla.edit',compact('malla'));
    }
    public function update(Request $request, $id)
    {
        //$this->validar($request);
        $malla=Malla::find($id);
        $datos=$request->All();
        if(isset($datos['fotoMalla'])){
            $img=$request->file('fotoMalla');
            $nomimg=time().'_'.$img->getClientOriginalName();
            Storage::disk('s3')->put('rij/imgProd/'.$nomimg,file_get_contents($img->getRealPath()),'public');
            $datos['fotoMalla']=env('AWS_URL').'/rij/imgProd/'.$nomimg;
        }
        else{
            $datos['fotoMalla']=$malla->fotoMalla;
        }
        $pre=$datos['precio'];
        $datos['precio']=$pre;
        $malla->update($datos);
        return redirect('mallas/');
    }
    public function destroy($id)
    {
        $malla=Malla::find($id);
        $malla->delete();
        return redirect('mallas/');
    }
}
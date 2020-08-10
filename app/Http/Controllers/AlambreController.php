<?php

namespace App\Http\Controllers;

use App\Alambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlambreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $alambres=Alambre::get();
        return view('alambre.index',compact('alambres'));
    }
    public function create()
    {
        return view('alambre.create');
    }
    protected function validar(Request $request){
        $this->validate($request,[
            'fotoAlambre'=>'image',
            'tipoAlambre' => 'required|in:amarre,galvanizado,puas',
            'precio' => 'required|numeric|min:0.1|max:1000|',
            'peso' => 'required|integer|min:0.1|max:100|',
            'descripcion' => 'max:255',
        ]);
    }
    public function store(Request $request)
    {
        //dd($request);
        $this->validar($request);
        $alambre = $request->All();
        if(isset($alambre['fotoAlambre'])) {
            $img = $request->file('fotoAlambre');
            $nomimg = time() . '_' . $img->getClientOriginalName();
            Storage::disk('s3')->put('rij/imgProd/'.$nomimg, file_get_contents($img->getRealPath()),'public');

            $alambre['fotoAlambre'] = env('AWS_URL').'/rij/imgProd/'.$nomimg;
        }
        if(!isset($alambre['descripcion'])){
            unset($alambre['descripcion']);
        }
        $pre=$alambre['precio'];
        $alambre['precio']=$pre;
        Alambre::create($alambre);
        return redirect('alambres/');
    }
    public function show($id)
    {
        $alambre=Alambre::find($id);
        return view('alambre.show',compact('alambre'));
    }
    public function edit($id)
    {
        $alambre=Alambre::find($id);
        return view('alambre.edit',compact('alambre'));
    }
    public function update(Request $request, $id)
    {
        //$this->validar($request);
        $datos=$request->All();
        $alambre=Alambre::find($id);
        if(isset($datos['fotoAlambre'])){
            $img=$request->file('fotoAlambre');
            $nomimg=time().'_'.$img->getClientOriginalName();
            Storage::disk('s3')->put('rij/imgProd/'.$nomimg,file_get_contents($img->getRealPath()),'public');
            $datos['fotoAlambre']=env('AWS_URL').'/rij/imgProd/'.$nomimg;
        }
        else{
            $datos['fotoAlambre']=$alambre->fotoAlambre;
        }
        $pre=$datos['precio'];
        $datos['precio']=$pre;
        $alambre->update($datos);
        return redirect('/alambres');
    }
    public function destroy($id)
    {
        $alambre=Alambre::find($id);
        $alambre->delete();
        return redirect('/alambres');
    }
}

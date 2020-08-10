<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users=User::get();
        return view('user.index',compact('users'));
    }
    public function create()
    {
        //
    }
    protected function validar(Request $request)
    {
        $this->validate($request, [
            'foto' => 'image',
            'nombre' => 'required|string|max:255',
            'cuenta' => 'required|string|max:20',
            'email' => 'required|string|email|max:255'
        ]);
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $user=User::find($id);
        return view('user.show',compact('user'));
    }
    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validar($request);
        $user=User::find($id);
        $datos=$request->All();
        if(isset($datos['foto'])){
            $img=$request->file('foto');
            $nomimg=time().'_'.$img->getClientOriginalName();
            //dd(Storage::disk('s3'));
            Storage::disk('s3')->put('rij/imgUsr/'.$nomimg,file_get_contents($img->getRealPath()),'public');
            //dd($nomimg);
            $datos['foto']=env('AWS_URL').'/rij/imgUsr/'.$nomimg;
        }
        else{
            $datos['foto']=$user->foto;
        }
        $user->update($datos);
        return redirect('/home');
    }
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('users/');
    }
}

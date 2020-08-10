<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table='clientes';
    protected $fillable=[
        'nombres',
        'apellidos',
        'direccion',
        'celular',
        'detalle'
    ];
    protected $dates=['deleted_at'];
    public function pedidos(){
        return $this->hasMany('App\Pedido');
    }
    public function cotizaciones(){
        return $this->hasMany('App\Cotizacion');
    }
}

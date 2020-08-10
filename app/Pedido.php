<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
    protected $table='pedidos';
    protected $fillable=[
        'fecha',
        'total',
        'cancelado',
        'estado',
        'cliente_id'
    ];
    protected $dates =['deleted_at'];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
    public function ordenMallas(){
        return $this->hasMany('App\OrdenMalla');
    }
    public function ordenAlambres(){
        return $this->hasMany('App\OrdenAlambre');
    }
}

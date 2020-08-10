<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenMalla extends Model
{
    use SoftDeletes;
    protected $table='orden_mallas';
    protected $fillable=[
        'alto',
        'largo',
        'cantidad',
        'precio',
        'malla_id',
        'pedido_id'
    ];
    protected $dates=['deleted_at'];
    public function malla(){
        return $this->belongsTo('App\Malla');
    }
    public function pedido(){
        return $this->belongsTo('App\Pedido');
    }
}

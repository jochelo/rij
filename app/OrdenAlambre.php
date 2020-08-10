<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdenAlambre extends Model
{
    use SoftDeletes;
    protected $table='orden_alambres';
    protected $fillable=[
        'cantidad',
        'precio',
        'alambre_id',
        'pedido_id'
    ];
    protected $dates=['deleted_at'];

    public function alambre(){
        return $this->belongsTo('App\Alambre');
    }
    public function pedido(){
        return $this->belongsTo('App\Pedido');
    }
}

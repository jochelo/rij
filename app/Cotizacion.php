<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cotizacion extends Model
{
    use SoftDeletes;
    protected $table='cotizacions';
    protected $fillable=[
        'descripcion',
        'cantidad',
        'precioU',
        'cliente_id'
    ];
    protected $dates=['deleted_at'];
    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }
}

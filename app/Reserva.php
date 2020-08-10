<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use SoftDeletes;
    protected $table='reservas';
    protected $fillable=[
    	'nombre',
    	'detalle',
    	'estado'
    ];
    protected $dates=['deleted_at'];
}

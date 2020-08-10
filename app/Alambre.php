<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alambre extends Model
{
    use SoftDeletes;
    protected $table='alambres';
    protected $fillable=[
        'tipoAlambre',
        'awg',
        'peso',
        'precio',
        'descripcion',
        'fotoAlambre',
    ];
    protected $dates=['deleted_at'];

    public function ordenAlambres(){
        return $this->hasMany('App\OrdenAlambre');
    }
}

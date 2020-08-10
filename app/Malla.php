<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Malla extends Model
{
    use SoftDeletes;
    protected $table ='mallas';
    protected $fillable =[
        'tipoMalla',
        'celda',
        'alambre',
        'precio',
        'descripcion',
        'fotoMalla',
        'alto',
        'largo'
    ];
    protected $dates =['deleted_at'];

    public function ordenMallas(){
        return $this->hasMany('App\OrdenMalla');
    }
}

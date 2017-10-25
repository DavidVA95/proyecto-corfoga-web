<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model {

    /**
     * Atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [
        'serialUserID',
        'name'
    ];

    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
        'asocebuID',
        'serialRegionID'
     ];

    /**
     * Atributos que deben ser ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'serialRegionID'
    ];

    // Se asocia la finca con su respectivo usuario.
    public function user() {
        $this->hasOne('App\User', 'serialID', 'serialUserID');
    }
}

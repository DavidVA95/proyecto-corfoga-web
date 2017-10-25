<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historical extends Model {

    /**
     * Atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
         'serialID',
         'serialUserID',
         'serialTypeID',
         'datetime',
         'description'
     ];

    /**
     * Atributos que deben ser ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'serialTypeID'
    ];

    // Se asocia un miembro del historial con el usuario responsable de la acción.
    public function user() {
        $this->hasOne('App\User', 'serialID', 'serialUserID');
    }
}

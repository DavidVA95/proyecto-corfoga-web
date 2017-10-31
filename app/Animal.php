<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model {

    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
         'id',
         'asocebuFarmID',
         'breedID',
         'register',
         'code',
         'sex',
         'birthdate',
         'fatherRegister',
         'motherRegister'
     ];

    /**
     * Atributos que deben ser ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'breedID'
    ];

    // Se asocia el animal con los detalles en los que se menciona.
    public function details() {
        $this->hasMany('App\Detail', 'animalID', 'id');
    }
}

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
         'serialID',
         'asocebuFarmID',
         'serialBreedID',
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
        'serialBreedID'
    ];

    // Se asocia el animal con los detalles en los que se menciona.
    public function details() {
        $this->hasMany('App\Detail', 'serialAnimalID', 'serialID');
    }
}

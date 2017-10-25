<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model {

    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
        'serialInspectionID',
        'serialAnimalID',
        'serialFeedingMethodID',
        'weight',
        'scrotalCircumference',
        'observations'
     ];

    /**
     * Atributos que deben ser ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'serialFeedingMethodID'
    ];

    // Se asocian los detalles con los animales a los que corresponden.
    public function animal() {
        $this->hasOne('App\Animal', 'serialID', 'serialAnimalID');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model {
    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
        'id',
        'asocebuFarmID',
        'datetime',
        'visitNumber'
     ];

     // Se asocia la inspección con sus respectivos detalles.
     public function details() {
         $this->hasMany('App\Detail', 'inspectionID', 'id');
     }

     // Se asocia la inspección con su respectiva finca.
     public function farm() {
         $this->hasOne('App\Farm', 'asocebuID', 'asocebuFarmID');
     }
}

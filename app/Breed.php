<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {

    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
         'serialID',
         'name'
     ];
}

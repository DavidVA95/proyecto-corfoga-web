<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
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

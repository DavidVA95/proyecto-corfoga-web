<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {
    /**
     * Atributos que no son asignables.
     *
     * @var array
     */
     protected $guarded = [
        'id',
        'name'
     ];
}

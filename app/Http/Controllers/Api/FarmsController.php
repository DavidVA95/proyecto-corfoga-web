<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Farms;

class FarmsController extends Controller {

    /**
     * Retorna las fincas de una región específica en un JSON para la aplicación móvil.
     * Si la región especificada es '0', se retornan las fincas correspondientes a todas las regiones.
     * @param region el identificador de la región solicitada o 0 si no se especificó.
     */
    public function __invoke($region) {
        if($region == '0') {
            return response()->json(Farms::all()->toArray(), 200);
        }
        else {

        }
    }
}

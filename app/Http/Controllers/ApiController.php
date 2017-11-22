<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use App\Farm;
use App\Animal;

class ApiController extends Controller {

    /**
     * Retorna las fincas de una región específica en un JSON para la aplicación móvil.
     * Si la región especificada es '0', se retornan las fincas correspondientes a todas las regiones.
     * @param region el identificador de la región solicitada o 0 si no se especificó.
     */
    public function getFarmsByRegion($regionID) {
        if($regionID == '0') {
            return response()->json(Farm::all(), 200, [], JSON_UNESCAPED_UNICODE);
        }
        else {
            return response()->json(Farm::where('regionID', $regionID)->get(), 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

    // Retorna los animales de una finca específica en un JSON para la aplicación móvil.
    public function getAnimalsByFarm($asocebuFarmID) {
        return response()->json(Animal::where('asocebuFarmID', $asocebuFarmID)->get(), 200, [], JSON_UNESCAPED_UNICODE);
    }

    // Recibe el request para la creación de una nueva inspección.
    public function createInspection() {

    }
}

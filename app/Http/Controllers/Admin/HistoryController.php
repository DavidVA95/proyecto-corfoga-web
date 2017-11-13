<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Historical;

class HistoryController extends Controller {

    /**
     * Carga el historial para después desplegarlo en la vista "index" correspondiente.
     * Además, calcula el tiempo que ha pasado desde cada acción del historial hasta la actualidad.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $historicals = DB::table('historicals')
            ->join('users', 'historicals.userID', '=', 'users.id')
            ->join('types', 'historicals.typeID', '=', 'types.id')
            ->select('users.name as userName', 'types.name as typeName', 'historicals.description', 'historicals.datetime')
            ->orderBy('historicals.datetime', 'desc')
            ->paginate(10);
        // Obtiene la fecha actual.
        $actualDate = Carbon::now('America/Costa_Rica');
        // Recorre la tabla del historial.
        foreach($historicals as $historical) {
            // Reemplaza la fecha almacenada de la acción por una con formato más amigable.
            $historical->datetime = Carbon::createFromFormat('Y-m-d H:i:s', $historical->datetime)
                ->format('h:i a ─ d/m/Y');
            /*
            // Reemplaza la fecha almacenada de la acción por un cálculo de cuantos días, horas y minutos han pasado.
            $historical->datetime = $actualDate
                ->diff(Carbon::createFromFormat('Y-m-d H:i:s', $historical->datetime))
                ->format('Hace %d días %H horas y %I minutos.');
            */
        }
        return view('admin.history', compact('historicals'));
    }
}

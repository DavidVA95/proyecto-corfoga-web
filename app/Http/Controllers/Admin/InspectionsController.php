<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;
use App\Inspection;
use App\User;

class InspectionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspections = new Inspection();
        // Se relacionan las fincas con los inspectores.
        $inspections = $inspections
            ->join('users', 'inspections.userID', '=', 'users.id')
            ->select('inspections.*', 'users.identification', 'users.id as userID',
                DB::raw('CONCAT(users.name, " ", users.lastName) as userFullName'));
        // Lista de filtros a aplicar.
        $queries = [];
        /* Las inspecciones siempre están ordenadas por fecha, pero podrían ordenarse
           con algunos argumentos extra. */
        $orderBy = 'inspections.datetime desc';
        $inspections = $inspections->orderByRaw($orderBy)->paginate(10)->appends($queries);
        $this->convertDate($inspections);
        return view('admin.inspections.index', compact('inspections'));
    }

    /**
     * Cambia el formato de las fechas de las inspecciones.
     *
     * @return \App\Inspection[] $inspections
     */
    public function convertDate($inspections) {
        // Recorre la tabla del historial.
        foreach($inspections as $inspection) {
            // Reemplaza la fecha almacenada de la acción por una con formato más amigable.
            $inspection->datetime = Carbon::createFromFormat('Y-m-d H:i:s', $inspection->datetime)
                ->format('d/m/Y ─ h:i a');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

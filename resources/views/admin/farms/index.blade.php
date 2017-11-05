@extends('layouts.admin')
@section('page')
<div class="container">
    <table class="table table-bordered shadow text-center">
        <tr class="success">
            <th>ID ASOCEBU</th>
            <th>Dueño</th>
            <th>Región</th>
            <th>Nombre</th>
            <th>Operaciones</th>
        </tr>
        <tbody>
            @foreach($farms as $farm)
            <tr>
                <td>{{$farm->asocebuID}}</td>
                <td>{{$farm->identification}}</td>
                <td>{{$farm->regionName}}</td>
                <td>{{{$farm->farmName}}}</td>
                <td>
                    {!!link_to_route('admin.fincas.edit', $title='Ver / Editar', $parameters=$farm->asocebuID, $attributes=['class'=>'btn btn-primary button'])!!}
                </td>
            </tr>
            @endforeach
        </tbody>
        {{$farms->links()}}
    </table>
</div>
@endsection

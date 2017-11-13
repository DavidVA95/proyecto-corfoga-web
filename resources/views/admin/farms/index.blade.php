@extends('layouts.admin')
@section('page')
    <div class="container">
        <div class="panel panel-success shadow">
            <div class="panel-heading">Fincas registradas</div>
            <div class="panel-body text-right">
                <div class="pull-left">
                    Filtro
                </div>
                <a class="btn btn-default" href="{{route('admin.fincas.create')}}"><i class="fa fa-plus fa-fw"></i>Crear finca</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
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
                            <td>
                                {!!link_to_route('admin.usuarios.edit', $title=$farm->identification, $parameters=$farm->userID)!!}
                            </td>
                            <td>{{$farm->regionName}}</td>
                            <td>{{{$farm->farmName}}}</td>
                            <td>
                                {!!link_to_route('admin.fincas.edit', $title='Ver / Editar', $parameters=$farm->asocebuID, $attributes=['class'=>'btn btn-primary button'])!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pull-right">
            {{$farms->links()}}
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('page')
    <div class="container">
        <div class="panel panel-success shadow">
            <div class="panel-heading">Animales registrados</div>
            <div class="panel-body text-right">
                <div class="pull-left">
                    Filtro
                </div>
                <a class="btn btn-default" href="{{route('admin.animales.create')}}"><i class="fa fa-upload fa-fw"></i>Cargar animales</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr class="success">
                        <th>Finca</th>
                        <th>Registro</th>
                        <th>Código</th>
                        <th>Raza</th>
                        <th>Sexo</th>
                        <th>Nacimiento</th>
                        <th>Padre</th>
                        <th>Madre</th>
                    </tr>
                    <tbody>
                        @foreach($animals as $animal)
                        <tr>
                            <td>{!!link_to_route('admin.fincas.edit', $title=$animal->asocebuFarmID, $parameters=$animal->asocebuFarmID)!!}</td>
                            <td>{{$animal->register}}</td>
                            <td>{{$animal->code}}</td>
                            <td>{{$animal->name}}</td>
                            <td>
                                @if($animal->sex == 'm')
                                    Macho
                                @else
                                    Hembra
                                @endif
                            </td>
                            <td>{{$animal->birthdate}}</td>
                            <td>{{$animal->fatherRegister}}</td>
                            <td>{{$animal->motherRegister}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pull-right">
            {{$animals->links()}}
        </div>
    </div>
@endsection

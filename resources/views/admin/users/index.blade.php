@extends('layouts.admin')
@section('page')
    <div class="container">
        <div class="panel panel-success shadow">
            <div class="panel-heading">Usuarios registrados</div>
            <div class="panel-body text-right">
                <div class="pull-left">
                    Filtro
                </div>
                <a class="btn btn-default" href="{{route('admin.usuarios.create')}}"><i class="fa fa-plus fa-fw"></i>Crear usuario</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <tr class="success">
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Operaciones</th>
                    </tr>
                    <tbody>
                        @foreach($users as $user)
                            @if($user->state == '1')
                                @php
                                    $class = '';
                                    $state = 'Activo';
                                    $action = 'Desactivar';
                                @endphp
                            @else
                                @php
                                    $class = 'danger';
                                    $state = 'Inactivo';
                                    $action = 'Activar';
                                @endphp
                            @endif
                            <tr class="{{$class}}">
                                <td>{{$user->identification}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->lastName}}</td>
                                <td>
                                    @if($user->role == 'a')
                                        Administrador
                                    @elseif($user->role == 'i')
                                        Inspector
                                    @else
                                        Productor
                                    @endif
                                </td>
                                <td>{{$state}}</td>
                                <td>
                                    {!!link_to_route('admin.usuarios.show', $title='Ver / Editar', $parameters=$user->id, $attributes=['class'=>'btn btn-success'])!!}
                                    {!!link_to_route('admin.usuarios.edit', $title=$action, $parameters=$user->id, $attributes=['class'=>'btn btn-danger'])!!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pull-right">
            {{$users->links()}}
        </div>
    </div>
@endsection

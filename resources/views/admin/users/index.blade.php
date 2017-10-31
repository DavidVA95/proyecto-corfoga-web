@extends('layouts.admin')
@section('page')
<div class="container shadow table-responsive">
    <table class="table table-striped">
        <thead>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Rol</th>
            <th>Operaciones</th>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tbody>
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
            <td>
                {!!link_to_route('admin.usuarios.show', $title='Detalles', $parameters=$user->identification, $attributes=['class'=>'btn btn-success'])!!}
                {!!link_to_route('admin.usuarios.edit', $title='Editar', $parameters=$user->identification, $attributes=['class'=>'btn btn-primary'])!!}

            </td>
        </tbody>
        @endforeach
        </tbody>
        {{$users->links()}}
    </table>
</div>
@endsection

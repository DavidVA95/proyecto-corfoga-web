@extends('layouts.admin')
@section('page')
<div class="table-responsive">
    <table class="container table">
        <thead>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Operaciones</th>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tbody>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phoneNumber}}</td>
            <td>
                @if($user->role === 'a')
                    Administrador
                @elseif($user->role === 'i')
                    Inspector
                @else
                    Productor
                @endif
            </td>
            <td>
                {!!link_to_route('admin.usuarios.edit', $title='Editar', $parameters=$user->id, $attributes=['class'=>'btn btn-primary'])!!}

            </td>
        </tbody>
        @endforeach
        </tbody>
        {{$users->links()}}
    </table>
</div>
@endsection

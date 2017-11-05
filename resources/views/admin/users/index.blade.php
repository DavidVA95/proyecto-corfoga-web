@extends('layouts.admin')
@section('page')
    <div class="container">
        <table class="table table-bordered shadow text-center">
            <tr class="success">
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Operaciones</th>
            </tr>
            <tbody>
                @foreach($users as $user)
                <tr>
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
                        {!!link_to_route('admin.usuarios.edit', $title='Ver / Editar', $parameters=$user->id, $attributes=['class'=>'btn btn-primary button'])!!}
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{$users->links()}}
        </table>
    </div>
@endsection

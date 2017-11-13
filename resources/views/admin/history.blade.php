@extends('layouts.admin')
@section('page')
<div class="container">
    <table class="table table-bordered shadow text-center">
        <tr class="success">
            <th>Hora y fecha</th>
            <th>Responsable</th>
            <th>Tipo de acción</th>
            <th>Descripción</th>
        </tr>
        <tbody>
            @foreach($historicals as $historical)
            <tr>
                <td>{{$historical->datetime}}</td>
                <td>{{$historical->userName}}</td>
                <td>{{$historical->typeName}}</td>
                <td>{{$historical->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-right">
        {{$historicals->links()}}
    </div>
</div>
@endsection

@extends('layouts.app')
@section('admin-options')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-user fa-fw"></i>Usuarios<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.usuarios.create')}}"><i class="fa fa-plus fa-fw"></i>Crear usuario</a></li>
            <li><a href="{{route('admin.usuarios.index')}}"><i class="fa fa-search fa-fw"></i>Ver usuarios</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-truck fa-fw"></i>Fincas<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.fincas.create')}}"><i class="fa fa-plus fa-fw"></i>Crear finca</a></li>
            <li><a href="{{route('admin.fincas.index')}}"><i class="fa fa-search fa-fw"></i>Ver fincas</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-paw fa-fw"></i>Animales<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.animales.create')}}"><i class="fa fa-file-excel-o fa-fw"></i>Cargar datos de animales</a></li>
            <li><a href="{{route('admin.animales.index')}}"><i class="fa fa-search fa-fw"></i>Ver animales</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-list-alt fa-fw"></i>Inspecciones<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.inspecciones.create')}}"><i class="fa fa-plus fa-fw"></i>Crear inspecciones</a></li>
            <li><a href="{{route('admin.inspecciones.index')}}"><i class="fa fa-search fa-fw"></i>Ver inspecciones</a></li>
        </ul>
    </li>
    <li><a href="#"><i class="fa fa-history fa-fw"></i>Historial</a></li>
@endsection
@section('content')
@if(Session::has('state'))
    <div class="container alert {{ Session::get('alert_class') }} alert-dismissible show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>¡{{Session::get('state')}}!</strong> {{Session::get('message')}}
    </div>
@endif
@yield('page')
@endsection

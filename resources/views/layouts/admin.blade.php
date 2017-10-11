@extends('layouts.app')

@section('content')
<div class="nav-side-menu">
    <div class="brand">Menú</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li class="active"><a href="#"><i class="fa fa-dashboard fa-lg"></i>Inicio</a></li>
            <li data-toggle="collapse" data-target="#users" class="collapsed">
                <a href="#"><i class="fa fa-gift fa-lg"></i>Gestión de usuarios<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="users">
                <li><a href="{{route('admin.usuarios.create')}}">Crear usuario</a></li>
                <li><a href="{{route('admin.usuarios.index')}}">Ver usuarios</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#farms" class="collapsed">
                <a href="#"><i class="fa fa-globe fa-lg"></i>Gestión de fincas<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="farms">
                <li><a href="{{route('admin.fincas.create')}}">Crear finca</a></li>
                <li><a href="{{route('admin.fincas.index')}}">Ver fincas</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#animals" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i>Gestión de animales<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="animals">
                <li><a href="{{route('admin.animales.create')}}">Cargar datos de animales</a></li>
                <li><a href="{{route('admin.animales.index')}}">Ver animales</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#inspections" class="collapsed">
                <a href="#"><i class="fa fa-car fa-lg"></i>Gestión de inspecciones<span class="arrow"></span></a>
            </li>
            <ul class="sub-menu collapse" id="inspections">
                <li><a href="{{route('admin.inspecciones.create')}}">Crear inspecciones</a></li>
                <li><a href="{{route('admin.inspecciones.index')}}">Ver inspecciones</a></li>
            </ul>
            <li><a href="#"><i class="fa fa-user fa-lg"></i>Historial</a></li>
            <li><a href="#"><i class="fa fa-users fa-lg"></i>Cerrar sesión</a></li>
        </ul>
    </div>
</div>
@yield('page')
@endsection

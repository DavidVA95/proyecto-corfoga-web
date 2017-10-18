@extends('layouts.app')
@section('content')
<div class="nav-side-menu">
    <div class="brand">Menú</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li class="active"><a href="#"><i class="fa fa-home fa-fw"></i>Inicio</a></li>
            <li data-toggle="collapse" data-target="#users" class="collapsed">
                <a href="#"><i class="fa fa-user fa-fw"></i>Gestión de usuarios<span class="arrow fa fa-angle-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="users">
                <li><a href="{{route('admin.usuarios.create')}}"><i class="fa fa-plus fa-fw"></i>Crear usuario</a></li>
                <li><a href="{{route('admin.usuarios.index')}}"><i class="fa fa-search fa-fw"></i>Ver usuarios</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#farms" class="collapsed">
                <a href="#"><i class="fa fa-truck fa-fw"></i>Gestión de fincas<span class="arrow fa fa-angle-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="farms">
                <li><a href="{{route('admin.fincas.create')}}"><i class="fa fa-plus fa-fw"></i>Crear finca</a></li>
                <li><a href="{{route('admin.fincas.index')}}"><i class="fa fa-search fa-fw"></i>Ver fincas</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#animals" class="collapsed">
                <a href="#"><i class="fa fa-paw fa-fw"></i>Gestión de animales<span class="arrow fa fa-angle-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="animals">
                <li><a href="{{route('admin.animales.create')}}"><i class="fa fa-file-excel-o fa-fw"></i>Cargar datos de animales</a></li>
                <li><a href="{{route('admin.animales.index')}}"><i class="fa fa-search fa-fw"></i>Ver animales</a></li>
            </ul>
            <li data-toggle="collapse" data-target="#inspections" class="collapsed">
                <a href="#"><i class="fa fa-list-alt fa-fw"></i>Gestión de inspecciones<span class="arrow fa fa-angle-down"></span></a>
            </li>
            <ul class="sub-menu collapse" id="inspections">
                <li><a href="{{route('admin.inspecciones.create')}}"><i class="fa fa-plus fa-fw"></i>Crear inspecciones</a></li>
                <li><a href="{{route('admin.inspecciones.index')}}"><i class="fa fa-search fa-fw"></i>Ver inspecciones</a></li>
            </ul>
            <li><a href="#"><i class="fa fa-history fa-fw"></i>Historial</a></li>
        </ul>
    </div>
</div>
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

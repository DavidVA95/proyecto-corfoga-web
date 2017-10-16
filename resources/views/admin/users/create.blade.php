@extends('layouts.admin')
@section('page')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default shadow">
                <div class="panel-heading">Crear un nuevo usuario</div>
                <div class="panel-body">
                    {!!Form::open(['route' => 'admin.usuarios.store', 'method' => 'POST', 'class' => 'form-horizontal'])!!}
                        {{ csrf_field() }}
                        <div class="form-group">
                            {!!Form::label('rol', 'Rol:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::select('rol', ['a' => 'Administrador', 'i' => 'Inspector', 'p' => 'Productor'], null, ['class' => 'form-control', 'id' => 'rol'])!!}
                            </div>
                        </div>
                        <div class="form-group hidden" id="idType">
                            {!!Form::label('type', 'Tipo de entidad:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::radio('type', 'f', true)!!}Física
                                </br>
                                {!!Form::radio('type', 'l')!!}Jurídica
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                            {!!Form::label('id', 'Cédula:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('id', '', ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus', 'id' => 'id'])!!}
                                @if ($errors->has('id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!!Form::label('name', 'Nombre:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('name', '', ['class' => 'form-control', 'required' => 'required'])!!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            {!!Form::label('lastName', 'Apellidos:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('lastName', '', ['class' => 'form-control', 'required' => 'required'])!!}
                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!!Form::label('password', 'Contraseña:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::password('password', ['class' => 'form-control', 'required' => 'required'])!!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('password-confirm', 'Confirmar contraseña:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!!Form::label('email', 'Email:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::email('email', '', ['class' => 'form-control', 'required' => 'required'])!!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phoneNumber') ? ' has-error' : '' }}">
                            {!!Form::label('phoneNumber', 'Número de teléfono:', ['class' => 'col-md-4 control-label'])!!}
                            <div class="col-md-6">
                                {!!Form::text('phoneNumber', '', ['class' => 'form-control', 'required' => 'required', 'id' => 'phoneNumber'])!!}
                                @if ($errors->has('phoneNumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!!Form::submit('Listo', ['class' => 'btn button'])!!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    {!!Html::script('js/admin/users/create.js')!!}
@endsection

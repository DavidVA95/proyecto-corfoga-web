<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Historical;
use Validator;
use Session;
use Redirect;

class UsersController extends Controller {

    /**
     * Carga los usuarios para después desplegarlos en la vista "index" correspondiente.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = DB::table('users')
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Retorna la página con el formulario para crear usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Realiza validaciones para el almacenaje de un nuevo usuario.
     * Si la información es correcta se almacena el usuario, sino, se informa al usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        /* El "identificationRegex" puede cambiar dependiendo del tipo de entidad
        que se quiera crear. */
        $identificationRegex = '/^[1-7]-[0-9]{4}-[0-9]{4}$/';
        if($request['type'] == 'l'){
            $identificationRegex = '/^3-[1-9]{3}-[1-9]{6}$/';
        }
        // Se crea un "Validator" con las reglas definidas para cada uno de los atributos.
        $validator = Validator::make($request->all(), [
            'identification' => 'required|regex:'.$identificationRegex.'|unique:users',
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            'password' => 'required|string|min:8|confirmed',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneNumber' => 'required|regex:/^[0-9]{4}-[0-9]{4}$/',
        ]);
        // Si la validación de algunos de los datos falla, se informa al usuario.
        if($validator->fails()) {
            return Redirect::to('admin/usuarios/create')->withErrors($validator)->withInput();
        }
        else {
            $state = 'Listo';
            $message = 'El usuario fue creado exitosamente.';
            $alert_class = 'alert-success';
            try {
                // Se almacena el usuario en la base de datos.
                User::create([
                    'identification' => $request['identification'],
                    'name' => $request['name'],
                    'lastName' => $request['lastName'],
                    'password' => bcrypt($request['password']),
                    'email' => $request['email'],
                    'phoneNumber' => $request['phoneNumber'],
                    'role' => $request['role']
                ]);
                // Se guarda un registro en el historial referente a la acción realizada.
                Historical::create([
                    'userID' => Auth::id(),
                    'typeID' => 1,
                    'datetime' => Carbon::now('America/Costa_Rica'),
                    'description' => 'Se creó el usuario con cédula: '.$request['identification']
                ]);
            }
            catch(Exception $exception) {
                $state = 'Error';
                $message = 'No se pudo crear el usuario.';
                $alert_class = 'alert-danger';
            }
            // Se genera la alerta para informar al usuario acerca del éxito/fracaso del proceso.
            Session::flash('state', $state);
            Session::flash('message', $message);
            Session::flash('alert_class', $alert_class);
            return Redirect::to('admin/usuarios/create');
        }
    }

    /**
     * Busca un usuario por el "id" y luego lo retorna en una vista para su edición.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Actualiza un usuario recién editado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Las reglas iniciales para los atributos.
        $rules = [
            'name' => 'required|string|max:30',
            'lastName' => 'required|string|max:30',
            'password' => 'required|string|min:8|confirmed',
            'phoneNumber' => 'required|regex:/^[0-9]{4}-[0-9]{4}$/',
        ];
        $user = User::find($id);
        /* Si el correo cambió se agrega la regla para validarlo, esto para evitar un
        choque consigo mismo en caso de no haber sido cambiado. */
        if($user->email != $request['email']){
            array_push($rules, ['email' => 'required|string|email|max:255|unique:users']);
        }
        // Se crea un "Validator" con las reglas definidas para cada uno de los atributos.
        $validator = Validator::make($request->all(), $rules);
        // Si la validación de algunos de los datos falla, se informa al usuario.
        if($validator->fails()) {
            return Redirect::to('admin/usuarios/'.$id.'/edit')->withErrors($validator)->withInput();
        }
        else {
            $state = 'Listo';
            $message = 'El usuario fue editado exitosamente.';
            $alert_class = 'alert-success';
            try {
                // Se actualiza el usuario con los nuevos valores.
                $user->name = $request['name'];
                $user->lastName = $request['lastName'];
                $user->password = bcrypt($request['password']);
                $user->email = $request['email'];
                $user->phoneNumber = $request['phoneNumber'];
                $user->save();
                // Se guarda un registro en el historial referente a la acción realizada.
                Historical::create([
                    'userID' => Auth::id(),
                    'typeID' => 2,
                    'datetime' => Carbon::now('America/Costa_Rica'),
                    'description' => 'Se editó el usuario con cédula: '.$user->identification
                ]);
            }
            catch(Exception $exception) {
                $state = 'Error';
                $message = 'No se pudo editar el usuario.';
                $alert_class = 'alert-danger';
            }
            // Se genera la alerta para informar al usuario acerca del éxito/fracaso del proceso.
            Session::flash('state', $state);
            Session::flash('message', $message);
            Session::flash('alert_class', $alert_class);
            return Redirect::to('admin/usuarios');
        }
    }
}

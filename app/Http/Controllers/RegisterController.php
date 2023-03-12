<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Equipo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function show(){
        //if(Auth::check()){
        //    return redirect()->route('home.index');
        //}
        return view('selectregistro');
    }
    public function showclient(){
        return view('auth.register');
    }

    public function registerclient(Request $request){
        //aca deberia esperar para que se valide por correo la cuenta
        $user = new User();
        $user->password = 'INSA2023';
        $user->rol = 'CLIENTE';
        $user->name =  $request->input('name');
        $user->email =  $request->input('email');
        $user->cuit =  $request->input('cuit');
        $user->direccion =  $request->input('direccion');
        $user->razon_social =  $request->input('razon_social');
        //$user = User::create($request->validated());

        $validator = Validator::make($user->toArray(), [
            'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //auth()->login($user);
        $user->save();
        return redirect('/home')->with('success', "Cliente correctamente creado");
    }
    public function showequipo(){
        return view('auth.equipos');
    }

    public function registerequipo(Request $request){
        //aca deberia esperar para que se valide por correo la cuenta
        $equipo = new Equipo();
        $equipo->id_usuario = (int) $request->input('id_usuario');
        $equipo->nombre =  $request->input('nombre');
        $equipo->marca =  $request->input('marca');
        $equipo->n_identificacion =  $request->input('n_identificacion');
        $equipo->modelo =  $request->input('modelo');
        $equipo->potencia =  $request->input('potencia');
        $equipo->descripcion =  $request->input('descripcion');
        $equipo->tipo =  $request->input('tipo');
        $equipo->estado =  $request->input('estado');
        $validator = Validator::make($equipo->toArray(), [
            'nombre' => 'required|min:3',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //auth()->login($user);
        $equipo->save();
        return redirect('/home')->with('success', "Equipo correctamente creado");
    }
    public function showservicio(){
        return view('auth.servicios');
    }
    public function registerservicio(Request $request){
        $tipo_de_servicio_request = $request->input('tipo_servicio');
        //dd($request);
        //aca deberia esperar para que se valide por correo la cuenta
        $servicio = Equipo::find((int)$request->input('id'));
        $servicio->tipo_servicio = $tipo_de_servicio_request;
        if($tipo_de_servicio_request == 'SERVICIO'){
            $servicio->horas = $request->input('horas');
        }else{
            //Si no es servicio es porque es reparacion
            $servicio->comentario = $request->input('comentario');
        }
        $servicio->servicio_activo =  true;
        //$user = User::create($request->validated());
        $validator = Validator::make($servicio->toArray(), [
            'id' => 'required|exists:equipos,id',
            'tipo_servicio' => [
                'required',
                Rule::in(['SERVICIO', 'REPARACION']),
            ],
            'horas'=> 'sometimes',
            'comentario'=> 'sometimes'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //auth()->login($user);
        $servicio->save();
        return redirect('/home')->with('success', "Servicio correctamente creado");
    }
}

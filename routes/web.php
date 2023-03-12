<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EquiposController;

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    //HOME
    Route::get('/', 'HomeController@index')->name('home.barra');
    Route::get('/home', 'HomeController@index')->name('home.index');
    //LOGIN
    Route::get('/login', 'LoginController@show')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.perform');
    //Rutas que requieren que estes autenticado
    Route::group(['middleware' => ['auth']], function() {
        //REGISTROS
        Route::get('/registros', 'RegisterController@show')->name('register.show');
        //CLIENTES
        Route::get('/registerclient', 'RegisterController@showclient')->name('register.showclient');
        Route::post('/registerclient', 'RegisterController@registerclient')->name('register.perform');
        //EQUIPOS
        Route::get('/registerequipo', 'RegisterController@showequipo')->name('register.showequipo');
        Route::post('/registerequipo', 'RegisterController@registerequipo')->name('register.registerequipo');
        //SERVICIOS
        Route::get('/registerservicio', 'RegisterController@showservicio')->name('register.showservicio');
        Route::post('/registerservicio', 'RegisterController@registerservicio')->name('register.registerservicio');
        //REPORTES
        Route::get('/reportes_presupuesto', 'ReportesController@showreportpresupuesto')->name('reportes.showpresupuesto');
        Route::get('/reportes_aprobacion', 'ReportesController@showreportaprobacion')->name('reportes.showaprobacion');
        Route::get('/equipo/{id}', 'EquiposController@showequipo')->name('equipos.showequipo');
        

        //LOGOUT
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

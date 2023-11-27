<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('datos_motocicleta_db/{matricula}', 'MotocicletaControllerDB@ver');

Route::get('actualizar_motocicleta_db/{matricula}/{anyo}', 'UpdateMotocicletaControllerDB@ver');

Route::get('datos_motocicleta/{matricula}', 'MotocicletaController@ver');

Route::get('actualizar_motocicleta/{matricula}/{anyo}', 'UpdateMotocicletaController@ver');




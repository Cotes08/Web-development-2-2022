<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;


class UpdateMotocicletaControllerDB extends Controller
{
    public function ver($matricula, $anyo)
    {
        DB::update("update motocicletas set Anyo = '$anyo' where Matricula = '$matricula'");
        return view('actualizar_motocicleta_db/ver');
    }
}?>

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;


class MotocicletaControllerDB extends Controller
{
    public function ver($matricula)
    {
        $motocicleta = DB::select("select * from MOTOCICLETAS where Matricula = '$matricula'");
        return view('datos_motocicleta_db/ver', ['motocicleta' => $motocicleta]);
    }
}?>

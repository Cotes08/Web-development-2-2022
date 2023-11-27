<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;


class UpdateMotocicletaController extends Controller
{
    public function ver($matricula, $anyo)
    {
        $motocicleta = App\Motocicleta::where('Matricula', $matricula)
                       ->update(['Anyo' => $anyo]);
        return view('actualizar_motocicleta/ver');
    }
}?>


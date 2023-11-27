<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;


class MotocicletaController extends Controller
{
    public function ver($matricula)
    {
        $motocicleta = App\Motocicleta::where('Matricula', $matricula)
                       ->take(1)
                       ->get();
        return view('datos_motocicleta/ver', ['motocicleta' => $motocicleta]);
    }
}?>


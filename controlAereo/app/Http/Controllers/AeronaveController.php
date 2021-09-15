<?php

namespace App\Http\Controllers;

use App\Models\Aeronave;
use Illuminate\Http\Request;



class AeronaveController extends Controller
{
    //Para guardar la informacion de la aeronave
    public function guardar(Request $request)
    {
        $validator = $this->validate(
            $request,
            [
                'aeronave_tipo' => 'required | string | min:3',
                'aeronave_tamanio' => 'required | string | min:3'
            ],
            [
                'aeronave_tipo.required' => 'Debe seleccionar un tipo de aeronave valido',
                'aeronave_tipo.string' => 'Debe seleccionar un tipo de aeronave valido',
                'aeronave_tipo.min:3' => 'Debe seleccionar un tipo de aeronave valido',
                'aeronave_tamanio.required' => 'Debe seleccionar un tamaño de aeronave valido',
                'aeronave_tamanio.string' => 'Debe seleccionar un tamaño de aeronave valido',
                'aeronave_tamanio.min:3' => 'Debe seleccionar un tamaño de aeronave valido',
            ]
        );

        $aeronaveData = request()->except("_token");
        Aeronave::insert($aeronaveData);


        return "Se guardo algo creo";
    }
}

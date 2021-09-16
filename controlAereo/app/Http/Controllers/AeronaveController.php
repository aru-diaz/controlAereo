<?php

namespace App\Http\Controllers;

use App\Models\Aeronave;
use Illuminate\Http\Request;



class AeronaveController extends Controller
{
    //Para listar la lisa de aeronaves
    public function listar()
    {
        $data['aeronaves'] = Aeronave::paginate(100);
        return view('lista', $data);
    }

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


        return back()->with('aeronaveAccion', 'La aeronave se registro con exito!');
    }

    //Para eliminar aeronave 
    public function eliminar($aeronave_id)
    {
        $nave = Aeronave::find($aeronave_id);

        $nave->delete();

        return back()->with('aeronaveAccion', 'La aeronave se elimino :C');
    }

    //Para editar aeronave
    public function vistaEditar($aeronave_id)
    {
        $aeronave = Aeronave::findOrFail($aeronave_id);

        return view('modificar', compact('aeronave'));
    }

    public function editar(Request $request, $aeronave_id)
    {
        $datosAeronave = request()->except((['_token','_method']));
        Aeronave::where('AERONAVE_ID','=',$aeronave_id)->update($datosAeronave);

        return back()->with('aeronaveAccion', 'La aeronave se modifico con exito!');
    }
}

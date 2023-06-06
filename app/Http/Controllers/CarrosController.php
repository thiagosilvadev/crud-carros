<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return response()->json($carros);
    }

    public function store(Request $request)
    {
        $carro = new Carro;
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->ano = $request->input('ano');
        $carro->save();

        return response()->json([
            'id' => $carro->id
        ]);
    }

    public function show($id)
    {
        $carro = Carro::find($id);
        return response()->json($carro)
    }

    public function update(Request $request, $id)
    {
        $carro = Carro::find($id);
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->ano = $request->input('ano');
        $carro->save();

        return response()->noContent();
    }

    public function destroy($id)
    {
        $carro = Carro::find($id);
        $carro->delete();

        return response()->noContent();
    }
}

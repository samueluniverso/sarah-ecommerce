<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;
use stdClass;
use Throwable;

class MedidaController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'completo'    => 'required|string|min:1',
                'sigla'       => 'required|string|min:1',
                'comprimento' => 'nullable|numeric',
                'largura'     => 'nullable|numeric',
                'altura'      => 'nullable|numeric'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $medida = new Medida();
        $medida->completo    = $data['completo'];
        $medida->sigla       = $data['sigla'];
        $medida->comprimento = $data['comprimento'] ?? null;
        $medida->largura     = $data['largura'] ?? null;
        $medida->altura      = $data['altura'] ?? null;
        $medida->save();

        return response()->json([
            'message' => 'Medida created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id'          => 'required|integer',
                'completo'    => 'required|string|min:1',
                'sigla'       => 'required|string|min:1',
                'comprimento' => 'nullable|numeric',
                'largura'     => 'nullable|numeric',
                'altura'      => 'nullable|numeric'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        if (!Medida::where('id', $data['id'])->exists()) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }

        $medida = Medida::where('id', $data['id'])->first();
        $medida->completo    = $data['completo'];
        $medida->sigla       = $data['sigla'];
        $medida->comprimento = $data['comprimento'] ?? null;
        $medida->largura     = $data['largura'] ?? null;
        $medida->altura      = $data['altura'] ?? null;
        $medida->update();

        return response()->json([
            'message' => 'Medida updated successfully!'
        ], 200);
    }

    public function get(Request $request)
    {
        $param = $request->route('id');

        if (!Medida::where('id', $param)->exists()) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }

        $medida = Medida::where('id', $param)->first();
        return response()->json([
            'data' => $medida
        ], 200);
    }

    // Usa o verbo delete
    public function delete(Request $request)
    {
        $param = $request->route('id');

        // O withTrashed diz para que mesmo se o registro estiver como softDelete o sistema exclua ele
        $medida = Medida::withTrashed()->find($param);

        if (!$medida) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }
        $medida->forceDelete();
        return response()->json([
            'message' => 'Medida deleted successfully!'
        ], 200);
    }

    // Usa o verbo patch
    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $medida = Medida::where('id', $param)->first();
        if (!$medida) {
            return response()->json([
                'message' => 'Medida not found!'
            ], 404);
        }
        $medida->delete();
        return response()->json([
            'message' => 'Medida inactivated successfully!'
        ], 200);
    }

    public function listaPaginada(Request $request)
    {
        try {
            $request->validate([
                'limit'  => 'nullable|integer',
                'offset' => 'nullable|integer'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $request->limit ?? '10'; // Se nao vier um limit ele assume como 10
        $request->offset ?? '0'; // Se nao vier um offset ele assume como 0

        $medida  = new Medida();
        $medidas = $medida->take($request->limit)->skip($request->offset)->get();

        $arrayMedidas = [];
        foreach ($medidas as $medida) {

            $objMedida = new stdClass();
            $objMedida->id           = $medida['id'];
            $objMedida->completo     = $medida['completo'];
            $objMedida->sigla        = $medida['sigla'];
            $objMedida->comprimennto = $medida['comprimennto'];
            $objMedida->altura       = $medida['altura'];
            $objMedida->largura      = $medida['largura'];
            $arrayMedidas[] = $objMedida;
        }

        return response()->json([
            'data' => $arrayMedidas
        ], 200);
    }
}

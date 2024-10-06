<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\PessoaFisica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class PessoaFisicaController extends Controller
{
    public function get(Request $request)
    {
        $param = $request->route('id');

        $pessoa_fisica = PessoaFisica::where('fk_pessoa', $param)->first();
        if (!$pessoa_fisica) {
            return response()->json([
                'message' => 'Pessoa Fisica not found!'
            ], 404);
        }
        $pessoa_fisica->pessoa;

        return response()->json([
            'pessoa_fisica' => $pessoa_fisica
        ], 200);
    }

    public function delete(Request $request)
    {
        $param = $request->route('id');

        $pessoa_fisica = PessoaFisica::where('fk_pessoa', $param)->first();
        if (!$pessoa_fisica) {
            return response()->json([
                'message' => 'Pessoa Fisica not found!'
            ], 404);
        }
        $pessoa = $pessoa_fisica->pessoa;
        $user = $pessoa->user;

        $pessoa_fisica->delete();
        $pessoa->delete();
        $user->delete();

        return response()->json([
            'message' => 'Pessoa Fisica deleted successfully!'
        ], 200);
    }

    public function store(Request $request)
    {
        try
        {
            $data = $request->validate([
                'username' => 'required|string|unique:users',
                'password' => 'required|min:8',
                'is_admin' => 'required|boolean',
                'cpf' => 'required|string|min:11|unique:pessoas_fisicas',
                'nome' => 'required|string|',
                'email' => 'required|string',
                'telefone' => 'required|string|min:11',
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $user = User::factory()->create([
            'name' => $data['nome'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => (bool) $data['is_admin'],
        ]);

        $pessoa = new Pessoa();
        $pessoa->nome = $data['nome'];
        $pessoa->telefone = $data['telefone'];
        $pessoa->fk_user = $user->id;
        $pessoa->save();

        $pessoa_fisica = new PessoaFisica();
        $pessoa_fisica->cpf = $data['cpf'];
        $pessoa_fisica->fk_pessoa = $pessoa->id;
        $pessoa_fisica->save();

        return response()->json([
            'codigo' => $pessoa->id,
            'message' => 'Pessoa Fisica created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try
        {
            $data = $request->validate([
                'id' => 'required|integer',
                'email' => 'required|string',
                'telefone' => 'required|string|min:11',
            ]);
        }
        catch(Throwable $th)
        {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $pessoa_fisica = PessoaFisica::where('fk_pessoa', $data['id'])->first();
        if (!$pessoa_fisica) {
            return response()->json([
                'message' => 'Pessoa Fisica not found!'
            ], 404);
        }
        $pessoa = $pessoa_fisica->pessoa;
        $user = $pessoa->user;

        $user->email = $data['email'];
        $user->update();

        $pessoa->telefone = $data['telefone'];
        $pessoa->update();

        return response()->json([
            'message' => 'Pessoa Fisica updated successfully!'
        ], 200);
    }
}

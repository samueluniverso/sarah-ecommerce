<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\PessoaJuridica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class PessoaJuridicaController extends Controller
{
    public function get(Request $request)
    {
        $param = $request->route('id');

        $pessoa_juridica = PessoaJuridica::where('fk_pessoa', $param)->first();
        if (!$pessoa_juridica) {
            return response()->json([
                'message' => 'Pessoa Juridica not found!'
            ], 404);
        }
        $pessoa_juridica->pessoa;

        return response()->json([
            'pessoa_juridica' => $pessoa_juridica
        ], 200);
    }

    public function delete(Request $request)
    {
        $param = $request->route('id');

        $pessoa_juridica = PessoaJuridica::withTrashed()->where('fk_pessoa', $param)->first();
        if (!$pessoa_juridica) {
            return response()->json([
                'message' => 'Pessoa Juridica not found!'
            ], 404);
        }

        $pessoa = $pessoa_juridica->pessoa;
        $user   = $pessoa->user;


        $pessoa_juridica->forceDelete();
        $pessoa->forceDelete();
        $user->forceDelete();

        return response()->json([
            'message' => 'Pessoa Juridica deleted successfully!'
        ], 200);
    }

    public function softDelete(Request $request)
    {
        $param = $request->route('id');

        $pessoa_juridica = PessoaJuridica::where('fk_pessoa', $param)->first();
        if (!$pessoa_juridica) {
            return response()->json([
                'message' => 'Pessoa Juridica not found!'
            ], 404);
        }
        $pessoa = $pessoa_juridica->pessoa;
        $user = $pessoa->user;

        $pessoa_juridica->delete();
        $pessoa->delete();
        $user->delete();

        return response()->json([
            'message' => 'Pessoa Juridica inactivated successfully!'
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'username' => 'required|string|unique:users',
                'password' => 'required|min:8',
                'is_admin' => 'required|boolean',
                'cnpj' => 'required|string|min:14|unique:pessoas_juridicas',
                'nome_fantasia' => 'required|string',
                'razao_social' => 'required|string',
                'email' => 'required|string',
                'telefone' => 'required|string|min:11',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $user = User::factory()->create([
            'name' => $data['nome_fantasia'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => (bool) $data['is_admin'],
        ]);

        $pessoa = new Pessoa();
        $pessoa->nome = $data['nome_fantasia'];
        $pessoa->telefone = $data['telefone'];
        $pessoa->fk_user = $user->id;
        $pessoa->save();

        $pessoa_juridica = new PessoaJuridica();
        $pessoa_juridica->nome_fantasia = $data['nome_fantasia'];
        $pessoa_juridica->razao_social = $data['razao_social'];
        $pessoa_juridica->cnpj = $data['cnpj'];
        $pessoa_juridica->fk_pessoa = $pessoa->id;
        $pessoa_juridica->save();

        return response()->json([
            'codigo' => $pessoa->id,
            'message' => 'Pessoa Juridica created successfully!'
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'id' => 'required|integer',
                'nome_fantasia' => 'required|string',
                'email' => 'required|string',
                'telefone' => 'required|string|min:11',
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }

        $pessoa_juridica = PessoaJuridica::where('fk_pessoa', $data['id'])->first();
        if (!$pessoa_juridica) {
            return response()->json([
                'message' => 'Pessoa Juridica not found!'
            ], 404);
        }
        $pessoa = $pessoa_juridica->pessoa;
        $user = $pessoa->user;

        $user->email = $data['email'];
        $user->name = $data['nome_fantasia'];
        $user->update();

        $pessoa->telefone = $data['telefone'];
        $pessoa->nome = $data['nome_fantasia'];
        $pessoa->update();

        $pessoa_juridica->nome_fantasia = $data['nome_fantasia'];
        $pessoa_juridica->update();

        return response()->json([
            'message' => 'Pessoa Juridica updated successfully!'
        ], 200);
    }

    public function getByNomeFantasia(Request $request)
    {
        return PessoaJuridica::whereRaw('lower(nome_fantasia) ILIKE ?', ["%{$request->route('nome')}%"])->get();
    }

    public function getByNomeRazaoSocial(Request $request)
    {
        return PessoaJuridica::whereRaw('lower(razao_social) ILIKE ?', ["%{$request->route('nome')}%"])->get();
    }

    public function getByCnpj(Request $request)
    {
        $list_pessoa_juridica = PessoaJuridica::whereRaw('lower(cnpj) ILIKE ?', ["%{$request->route('cpf')}%"])->get();
        foreach ($list_pessoa_juridica as $pessoa) {
            $pessoa->pessoa;
        }

        return $list_pessoa_juridica;
    }
}

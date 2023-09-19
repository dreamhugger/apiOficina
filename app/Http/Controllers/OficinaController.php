<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Oficina;
use Illumminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Http\Controllers;

class OficinaController extends Controller
{
    public function index()
    {
        $computadoresDados = Oficina::All();
        $contador = $computadoresDados->count();

        return 'Computadores: '. $contador. $computadoresDados .Response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function store(Request $request)
    {
        $computadoresDados = $request->All();

        $valida = Validator::make($computadoresDados, [
            'Modelo'=> 'required',
            'Processador'=> 'required',
            'OS'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados inválidos'.$valida->errors(true). 500;
        }

        $oficinaBanco = Oficina::create($computadoresDados);

        if($oficinaBanco){
            return 'Computadores cadastrados '.Response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return 'Computadores não cadastrados '.Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    public function show(string $id)
    {
        $oficinaBanco = Oficina::find($id);
        $contador = $oficinaBanco->count();

        if($oficinaBanco){
            return 'Oficina encontradas: '.$contador.' - '.$oficinaBanco.response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return 'Oficina não encontradas.'.response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    public function update(Request $request, string $id)
    {
        $oficinaBanco = $request->All();
        $valida = Validator::make($oficinaBanco,[
            'Modelo'=> 'required',
            'Processador'=> 'required',
            'OS'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados incompletos '.$valida->errors(true). 500;
        }

        $oficinaBanco = Bebida::find($id);
        $oficinaBanco->Modelo = $computadoresDados['Modelo'];
        $oficinaBanco->Processador = $computadoresDados['Processador'];
        $oficinaBanco->OS = $computadoresDados['OS'];

        $registroComputadores = $oficinaBanco::save();
        if($registroComputadores){
            return 'Dados cadastrados com sucesso.';
        }else{
            return 'Dados não cadastrados no banco de dados.';
        }
    }

    public function destroy(string $id)
    {
        $oficinaBanco = Oficina::find($id);
        if($oficinaBanco){
            $oficinaBanco->delete();
            return 'O computador foi deletado com sucesso.'.Response()->json([], Response::HTTP_NO_CONTENT);
        }else{
            return 'O computador não foi deletado com sucesso.'.Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }
}

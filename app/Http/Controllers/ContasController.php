<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;
use Validator;

class ContasController extends Controller
{
    function procurarConta($conta){
       //dd($conta) ;
        
       $conta = Conta::where('conta','=',$conta)->get();
       
       return response()->json([
            'error' => false,
            'conta'  => $conta,
        ], 200);
    }

    function saldoAtual($id){
        $s = Conta::findOrFail($id);
        return $s['saldo'];
    }
    
    function depositar(request $req){
        $saldoAtual = $this->saldoAtual($req['id']);

        $saldoAtual += $req['valor'];
        Conta::updateOrCreate(['id' => $req->id],
        ['saldo' => $saldoAtual]);

        return response()->json([
            'error' => false,
            'saldo' => $saldoAtual,
            'id'    => $req->id
        ], 200);
    }

    function sacar(request $req){
        $saldoAtual = $this->saldoAtual($req['id']);        

        if($saldoAtual >= $req['valor']){
            $saldoAtual -= $req['valor'];
            Conta::updateOrCreate(['id' => $req->id],
            ['saldo' => $saldoAtual]);

            return response()->json([
                'error' => false,
                'saldo' => $saldoAtual,
                'msg'    => 1
            ], 200);
        }
        else{            
            return response()->json([
                'error' => false,
                'saldo' => $saldoAtual,
                'msg' => 0
            ], 200);
        }
    }
}

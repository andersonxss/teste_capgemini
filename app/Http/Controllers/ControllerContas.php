<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contas;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ControllerContas extends Controller
{
  

    public function getDadosContaUser($id){
        

           $dados = DB::table('contas')
           ->join('users', 'users.id', '=', 'contas.con_user_id')
           ->where('con_user_id', $id)->first();
        return response()->json($dados, 200);
       
      
    }


    public function criarNovaConta($con_user_id){
      
        Contas::create([
                    'con_user_id' => $con_user_id,
                    'con_agencia' => '3456',
                    'con_conta'   => random_int(100000, 999999),
                    'con_saldo'   => 0
                  ]);
      
    }

    public function SetDepositoConta(Request $request){

        $deposito = Contas::where("con_user_id",$request->con_user_id)->first();
        if ($deposito) {
            Contas::where('con_user_id',$request->con_user_id)->increment('con_saldo',$request->con_saldo);
            return  $this->getDadosContaUser($request->con_user_id);
        } else {
         
        }
    }

    public function SetSaqueConta(Request $request){

        $deposito = Contas::where("con_user_id",$request->con_user_id)->first();
        if ($deposito) {
           Contas::where('con_user_id',$request->con_user_id)->decrement('con_saldo',$request->con_saldo);
            return  $this->getDadosContaUser($request->con_user_id);
        } else {
         
        }
    }

   
}

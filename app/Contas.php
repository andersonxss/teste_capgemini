<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    protected $fillable = ['con_user_id','con_agencia','con_conta','con_saldo'];

    public function GetUsers(){
        return $this->belongsToMany(User::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtrato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extrato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ext_user_id');
            $table->unsignedBigInteger('ext_ope_id');
            $table->float('ext_valor', 8, 2);
            $table->foreign('ext_user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('ext_ope_id')
            ->references('id')
            ->on('operacao')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extrato');
    }
}

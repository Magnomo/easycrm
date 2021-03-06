<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total', 7,3)->nullable();
            $table->integer('numero_parcelas')->nullable();
            $table->integer('forma_pagamento')->unsigned()->index('fK_forma_pagamento');
            $table->string('status',50)->nullable();
            $table->integer('cliente_id')->unsigned()->index('fk_cliente1')->nullable();
            $table->integer('usuario_id')->unsigned()->index('fk_usuario1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda');
    }
}

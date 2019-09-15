<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_venda', function (Blueprint $table) {

            $table->integer('venda_id')->unsigned()->index('fk_venda');
            $table->integer('produto_id')->unsigned()->index('fk_pagamento');
            $table->integer('quantidade');
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
        Schema::drop('item_venda');
    }
}

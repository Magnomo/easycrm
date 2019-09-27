<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 50);
            $table->string('marca', 50);
            $table->string('cor', 50);
            $table->double('preco', 7, 3);
            $table->integer('categoria_id')->unsigned()->index('fk_categoria');
            $table->string('descricao', 500);
            $table->enum('tamanho', ['PP', 'P', 'M', 'G', 'GG']);
            $table->softDeletes();
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
        Schema::dropIfExists('produto');
    }
}

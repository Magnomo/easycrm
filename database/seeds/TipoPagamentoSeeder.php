<?php

use Illuminate\Database\Seeder;

class TipoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_pagamento')->insert(
            [
                'id'=>'1',
                'nome' =>'Crédito' 
            ],
            
            [
                'id'=>'2',
                'nome'=>'Débito'
            ],
            [
                'id'=>'3',
                'nome'=>'Dinheiro'
            ],[
                'id'=>'4',
                'nome'=>'Outro'
            ]
        );
    }
}

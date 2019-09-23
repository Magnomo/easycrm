<?php

use Illuminate\Database\Seeder;

class tipoTelefoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_Telefone')->insert(
            [
                'id'=>'1',
                'tipo' =>'Comercial' 
            ],
            
            [
                'id'=>'2',
                'tipo'=>'Residencial'
            ],
            [
                'id'=>'3',
                'tipo'=>'Celular'
            ]
        );
    }
}

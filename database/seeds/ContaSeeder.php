<?php

use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contas')->insert(['nome'=>'Ana Maria', 'conta'=>'12345', 'saldo'=>'123.90']);
        DB::table('contas')->insert(['nome'=>'Beatriz Alvarenga', 'conta'=>'98765', 'saldo'=>'10.00']);
        DB::table('contas')->insert(['nome'=>'Carlos Abreu', 'conta'=>'123', 'saldo'=>'1000.00']);
        DB::table('contas')->insert(['nome'=>'Diego Silva', 'conta'=>'55555', 'saldo'=>'125.90']);
    }
}

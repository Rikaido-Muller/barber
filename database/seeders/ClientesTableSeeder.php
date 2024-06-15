<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class ClientesTableSeeder extends Seeder
{
    public function run (): void{
        $cliente = 10;
        for ($i = 0; $i < $cliente; $i++){
            Cliente::create([
                'nome' => Str::random(10),
                'email' => Str::random(15).'@gmail.com',
                'telefone' => '996'.Str::random(6),
        ]);
    }
    }
}
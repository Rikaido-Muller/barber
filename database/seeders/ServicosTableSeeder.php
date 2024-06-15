<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servico;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class ServicosTableSeeder extends Seeder
{
    public function run (): void{
        $servico = 10;
        for ($i = 0; $i < $servico; $i++){
        Servico::create([
            'nome' => Str::random(10),
            'valor' => 'R$ '.Str::random(2).',00',
            'duracao' => Str::random(2),
        ]);
    }
}
}

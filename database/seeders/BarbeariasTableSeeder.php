<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barbearia;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BarbeariasTableSeeder extends Seeder
{public function run (): void{
    $barbearia = 10;
    for ($i = 0; $i < $barbearia; $i++){
    Barbearia::create([
        'nome' => Str::random(10),
        'rua' => Str::random(10),
        'bairro' => Str::random(8),
    ]);
}
}
}


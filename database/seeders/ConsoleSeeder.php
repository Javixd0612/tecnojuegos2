<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Console;

class ConsoleSeeder extends Seeder
{
    public function run()
    {
        Console::insert([
            ['name' => 'PlayStation 4'],
            ['name' => 'Xbox Series'],
            ['name' => 'Nintendo Switch'],
        ]);
    }
}


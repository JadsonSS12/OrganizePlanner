<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nome' => 'Test User',
            'email' => 'test@gmail.com',
        ]);

        Category::create(['name' => 'Pessoal']);
        Category::create(['name' => 'Estudos']);
        Category::create(['name' => 'Compras']);
        Category::create(['name' => 'Trabalho']);


    }
}

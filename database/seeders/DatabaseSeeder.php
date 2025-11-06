<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar usuário padrão para autenticação
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@todolist.com',
            'password' => Hash::make('password'),
        ]);

        $this->command->info('Usuário padrão criado:');
        $this->command->info('Email: admin@todolist.com');
        $this->command->info('Senha: password');
    }
}


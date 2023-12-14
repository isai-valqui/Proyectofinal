<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User; // Asegúrate de importar el modelo Role

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
      
     $role1 = Role::create(['name' => 'Jefe de Compra']);
     $role2 = Role::create(['name' => 'Gerente de Operaciones']);
     $role3 = Role::create(['name' => 'Barista']);

     $user1 = User::create([
         'name' => 'Jefe de Compra',
         'email' => 'jefe@gmail.com',
         'password' => Hash::make('isai2023'),
         'role_id' => $role1->id, 
     ]);

     $user2 = User::create([
         'name' => 'Gerente de Operaciones',
         'email' => 'gerente@gmail.com',
         'password' => Hash::make('isai2023'),
         'role_id' => $role2->id, 
     ]);

     $user3 = User::create([
         'name' => 'Barista',
         'email' => 'barista@gmail.com',
         'password' => Hash::make('isai2023'),
         'role_id' => $role3->id, 
     ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}


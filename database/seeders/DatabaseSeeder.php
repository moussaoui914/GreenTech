<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'firstname' => 'Admin',
            'lastname' => 'System',
            'email' => 'admin@greentech.com',
            'phone' => '0600000000',
            'password' => Hash::make('admin123'),

            ]);

        User::create([
            'firstname' => 'Client',
            'lastname' => 'Test',
            'email' => 'client@test.com',
            'phone' => '0611111111',
            'password' => Hash::make('client123'),
        ]);

        $categories = ['Panneaux Solaires', 'Éoliennes', 'Systèmes d\'Irrigation'];
        foreach ($categories as $cat) {
            Category::create(['name' => $cat]);
        }

        Produit::create([
            'name' => 'Panneau Solaire 300W',
            'category_id' => 1,
            'prix' => 2499.99,
            'stock' => 15,
            'description' => 'Panneau solaire haute efficacité'
        ]);

        Produit::create([
            'name' => 'Éolienne Domestique',
            'category_id' => 2,
            'prix' => 5999.99,
            'stock' => 8,
            'description' => 'Éolienne pour maison individuelle'
        ]);
    }
}
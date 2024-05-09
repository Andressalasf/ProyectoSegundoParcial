<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\User;
use App\Models\Sale_detail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\Product::factory(10)->create();
        Customer::factory(50)->create();
        Product::factory(50)->create();
        Sale::factory(50)->create();
        Sale_detail::factory(50)->create();
        User::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

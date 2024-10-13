<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Storage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::factory()
            ->count(5)
            ->create();

        $storages = Storage::factory()
            ->count(10)
            ->for($users->random(), 'owner')
            ->create();

        Product::factory()
            ->count(25)
            ->for($storages->random(), 'storage')
            ->for($users->random(), 'owner')
            ->create();
    }
}

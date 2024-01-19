<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shop::insert([
            [
                'title' => 'Nord',
            ],
            [
                'title' => 'Süd',
            ],
            [
                'title' => 'Ost',
            ],
            [
                'title' => 'West',
            ],
            [
                'title' => 'Mitte',
            ],
        ]);
    }
}

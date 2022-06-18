<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(['name' => 'General']);
        ProductCategory::create(['name' => 'Medicina']);
        ProductCategory::create(['name' => 'Alimentos']);
    }
}

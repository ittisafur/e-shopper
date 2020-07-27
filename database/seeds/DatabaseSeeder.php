<?php

use App\Category;
use App\CategoryProduct;
use App\Model\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
        factory(Product::class, 100)->create();
        factory(Category::class, 10)->create();
        factory(CategoryProduct::class, 200)->create();
    }
}

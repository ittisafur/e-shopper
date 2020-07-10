<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->word;
    return array(
        'sku' => $faker->isbn10(),
        'name' => ucfirst($name),
        'slug' => str_slug($name),
        'price' => $faker->numberBetween(100,25000),
        'details' => $faker->realText(50, 2),
        'description' => $faker->realText(200,2),
        'product_stock' => $faker->numberBetween(5,100),
        'featured' => rand(0,1)
    );
});

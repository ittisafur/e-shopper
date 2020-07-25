<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoryProduct;
use App\Model;
use Faker\Generator as Faker;

$factory->define(CategoryProduct::class, function (Faker $faker) {
    return [
        'category_id' => rand(1,10),
        'product_id' => rand(1,100)
    ];
});

<?php

/** @var \Faker\Generator $faker */

return array(
    'name' => 'Genre ' . $faker->colorName . ' ' . mt_rand(1, 10000),
    'created_at' => time(),
    'updated_at' => time(),
);

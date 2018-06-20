<?php

/** @var \Faker\Generator $faker */
$nameParts = [$faker->century, $faker->colorName, $faker->city];
shuffle($nameParts);
return array(
    'name' => 'Album ' . implode(' ', $nameParts),
    'created_at' => time(),
    'updated_at' => time(),
);

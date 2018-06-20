<?php

/** @var \Faker\Generator $faker */
$nameParts = [$faker->monthName, $faker->colorName, $faker->firstName];
shuffle($nameParts);
return array(
    'name' => 'Track ' . implode(' ', $nameParts),
    'created_at' => time(),
    'updated_at' => time(),
);

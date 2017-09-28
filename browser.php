<?php
require_once "vendor/autoload.php";

$faker = \Faker\Factory::create();
$arr = [];
for ($i = 0; $i < 50; $i++) {
    $arr[] = [
        'name' => $faker->name,
        'lorem' => $faker->lastName
    ];
}

dump($arr);
<?php
require_once "config.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('email', 100);
    $table->string('name', 100);
    $table->string('password', 100);
    $table->timestamps();
});
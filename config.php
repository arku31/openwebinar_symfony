<?php
require_once __DIR__."/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
   'driver' => 'mysql',
   'host' => 'localhost',
   'database' => 'webinar',
   'username' => 'root',
   'password' => '123',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

class User extends Illuminate\Database\Eloquent\Model
{

}

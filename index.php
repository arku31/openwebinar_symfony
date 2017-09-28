<?php

require __DIR__.'/vendor/autoload.php';
require "UserAddCommand.php";
require "UserPopulate.php";
require_once "UserAll.php";
require_once "UserSearch.php";
require_once "FindFile.php";

use Symfony\Component\Console\Application;

$application = new Application();

// ... register commands
$application->add(new UserAddCommand());
$application->add(new UserPopulate());
$application->add(new UserAll());
$application->add(new UserSearch());
$application->add(new FindFile());
$application->run();


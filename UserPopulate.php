<?php
require_once "config.php";

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class UserPopulate extends Command
{
    protected function configure()
    {
        $this->setName('user:populate')
            ->setDescription('Создает кучу новых пользователей')
            ->setHelp('Создет фиктивных пользователей');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->name = $faker->name();
            $user->email = $faker->email;
            $user->password = $faker->password();
            $user->save();
        }
    }
}
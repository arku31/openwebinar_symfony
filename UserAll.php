<?php
require_once "config.php";

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class UserAll extends Command
{
    protected function configure()
    {
        $this->setName('user:all')
            ->setDescription('Показать всех пользователей')
            ->setHelp('Показать пользователей');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $users = User::all();
        $output->writeln('id|name|email');

        foreach ($users as $user) {
            $output->writeln($user->id.'|'.$user->name.'|'.$user->email);
        }
    }
}
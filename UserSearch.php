<?php
require_once "config.php";

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class UserSearch extends Command
{
    protected function configure()
    {
        $this->setName('user:search')
            ->setDescription('Поиск пользователей')
            ->setHelp('Поиск пользователей')
            ->addArgument('email', InputArgument::REQUIRED, 'Email для поиска');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = $input->getArgument('email');
        $search = User::where('email', 'like', "%$email%")
            ->orWhere('name', 'like', "%$email%")->get();
        if ($search->count() == 0) {
            $output->writeln('<error>Не найдено пользователей с email: ' . $email . '</error>');
            exit();
        }


        $output->writeln('id|name|email');
        foreach ($search as $user) {
            $output->writeln($user->id . '|' . $user->name . '|' . $user->email);
        }
    }
}
<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class UserAddCommand extends Command
{
    protected function configure()
    {
        $this->setName('user:create')
            ->setDescription('Создает нового пользователя')
            ->setHelp('Создает пользователя')
            ->addOption(
                'username',
                'u',
                InputOption::VALUE_REQUIRED,
                'Введите имя пользователя',
                null
            )->addOption(
                'email',
                'e',
                InputOption::VALUE_REQUIRED,
                'Введите email',
                null
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getOption('username');
        $email = $input->getOption('email');
        $this->validateUsername($username, $output);
        $this->validateEmail($email, $output);

        $user = new User();
        $user->name = $username;
        $user->email = $email;
        $user->password = rand(1, 100000);
        $user->save();

        $output->writeln('Cоздан пользователь с ид = '.$user->id);
    }

    private function validateUsername($username, $output)
    {
        if (empty($username)) {
            $output->writeln('<error>Пустое имя пользователя</error>');
            exit();
        }
    }
    private function validateEmail($username, $output)
    {
        if (empty($username)) {
            $output->writeln('<error>Пустой email</error>');
            exit();
        }
    }
}
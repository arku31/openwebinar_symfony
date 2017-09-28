<?php
require_once "config.php";

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;


class FindFile extends Command
{
    protected function configure()
    {
        $this->setName('file:find')
            ->setDescription('Поиск файла')
            ->setHelp('Поиск файла')
            ->addArgument('filename', InputArgument::REQUIRED, 'Файл для поиска');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        $finder = new Finder();
        $finder->in(__DIR__)
            ->sortByName()
            ->notPath('vendor')
            ->name('*'.$filename."*")
            ->contains('Faker')
            ->files()
        ;
        $filelist = (iterator_to_array($finder, true));
        foreach ($filelist as $file) {
            $output->writeln('<info>File found:</info> '.$file->getRealPath());
        }
        dump($filelist);
    }
}
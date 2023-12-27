<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTestFixturesCommand extends Command
{
    protected static $defaultName = 'app:create-test-fixtures';

    protected function configure()
    {
        $this->setDescription('Creation esemble de donné avec fake data');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('Ensemble de donné créer!');
        return Command::SUCCESS;
    }
}

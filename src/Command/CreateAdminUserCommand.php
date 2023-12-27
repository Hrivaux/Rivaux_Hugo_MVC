<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateAdminUserCommand extends Command
{
    protected static $defaultName = 'app:create-admin-user';

    protected function configure()
    {
        $this->setDescription('Création admin avec mdp hash');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('Admin créer !');
        return Command::SUCCESS;
    }
}

<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendTestEmailCommand extends Command
{
    protected static $defaultName = 'app:send-test-email';

    protected function configure()
    {
        $this->setDescription('Envoie d un test email');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('Test email envoyé!');
        return Command::SUCCESS;
    }
}

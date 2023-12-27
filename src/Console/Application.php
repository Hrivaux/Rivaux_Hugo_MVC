<?php

namespace App\Console;

use Symfony\Component\Console\Application;
use App\Command\SendTestEmailCommand;
use App\Command\CreateAdminUserCommand;
use App\Command\CreateTestFixturesCommand;

class CustomApplication extends Application
{
    protected function getDefaultCommands(): array
    {
        $commands = array_merge(parent::getDefaultCommands(), [
            new SendTestEmailCommand(),
            new CreateAdminUserCommand(),
            new CreateTestFixturesCommand(),
        ]);

        return $commands;
    }
}

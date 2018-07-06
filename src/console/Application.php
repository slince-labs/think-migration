<?php

/*
 * This file is part of the topthink/think-migration
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace think\migration\console;

use Symfony\Component\Console\Application as SymfonyApplication;
use Phinx\Console\Command as PhinxCommand;

class Application extends SymfonyApplication
{
    public function __construct($name = 'UNKNOWN', $version = 'UNKNOWN')
    {
        parent::__construct($name, $version);

        $this->addCommands([
            new Command\Create(),
            new PhinxCommand\Migrate(),
            new PhinxCommand\Rollback(),
            new PhinxCommand\Status(),
            new PhinxCommand\Breakpoint(),
            new PhinxCommand\Test(),
            new PhinxCommand\SeedCreate(),
            new PhinxCommand\SeedRun(),
        ]);
    }
}
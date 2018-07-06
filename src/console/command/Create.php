<?php

/*
 * This file is part of the topthink/think-migration
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace think\migration\console\command;

use Phinx\Console\Command\Create as CreateCommand;
use think\migration\console\ConfigurationTrait;

class Create extends CreateCommand
{
    use ConfigurationTrait;
}

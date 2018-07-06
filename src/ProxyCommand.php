<?php

/*
 * This file is part of the topthink/think-migration
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace think\migration;

use Phinx\Console\PhinxApplication;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\migration\console\Application;

class ProxyCommand extends Command
{
    /**
     * @var string
     */
    protected $forwardCommand;

    /**
     * @var PhinxApplication
     */
    protected static $phinxApplication;

    protected $withArguments = false;

    public function __construct($name, $forwardCommand, Application $phinxApplication)
    {
        $this->forwardCommand = $forwardCommand;
        static::$phinxApplication = $phinxApplication;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    public function configure()
    {
        $forwardCommand = static::$phinxApplication->get($this->forwardCommand);
        $this->setDescription($forwardCommand->getDescription())
            ->setHelp($forwardCommand->getHelp());
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Input $input, Output $output)
    {
        $input = new StringInput(preg_replace("#^{$this->getName()}#U", $this->forwardCommand, trim((string) $input, '"')));
        static::$phinxApplication->run($input, new ConsoleOutput());
    }

    /**
     * {@inheritdoc}
     */
    public function getNativeDefinition()
    {
        return static::$phinxApplication->get($this->forwardCommand)->getNativeDefinition();
    }
}
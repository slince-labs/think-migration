<?php
// +----------------------------------------------------------------------
// | TopThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.topthink.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: zhangyajun <448901948@qq.com>
// +----------------------------------------------------------------------
use think\migration\console\Application;
use think\migration\ProxyCommand;
use think\Console;

$phinxApplication = new Application();

$commands = [
    new ProxyCommand('migrations:breakpoint', 'breakpoint', $phinxApplication),
    new ProxyCommand('migrations:create', 'create', $phinxApplication),
    new ProxyCommand('migrations:migrate', 'migrate', $phinxApplication),
    new ProxyCommand('migrations:rollback', 'rollback', $phinxApplication),
    new ProxyCommand('migrations:status', 'status', $phinxApplication),
    new ProxyCommand('migrations:test', 'test', $phinxApplication),
    new ProxyCommand('seed:create', 'seed:create', $phinxApplication),
    new ProxyCommand('seed:run', 'seed:run', $phinxApplication),
];

Console::init(false)->addCommands($commands);

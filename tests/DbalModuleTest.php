<?php

namespace Ray\DbalModule;

use Doctrine\DBAL\Driver\Connection;
use Ray\Di\Injector;

class DbalModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testModule()
    {
        $instance = (new Injector(new DbalModule('driver=pdo_sqlite&memory=true'), $_ENV['TMP_DIR']))->getInstance(Connection::class);
        $this->assertInstanceOf(Connection::class, $instance);
    }
}

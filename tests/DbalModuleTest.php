<?php

namespace BEAR\DbalModule;

use Doctrine\DBAL\Driver\Connection;
use Ray\Di\Injector;

class DbalModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testModule()
    {
        $_ENV['DBAL_CONFIG'] = 'driver=pdo_sqlite&memory=true';
        $instance = (new Injector(new DbalModule, $_ENV['TMP_DIR']))->getInstance(Connection::class);
        $this->assertInstanceOf(Connection::class, $instance);
    }
}

<?php
/**
 * This file is part of the Ray.DbalModule package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
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

    public function testQualifier()
    {
        $db1Module = new DbalModule('driver=pdo_sqlite&memory=true', 'db1');
        $db2Module = new DbalModule('driver=pdo_sqlite&memory=true', 'db2');
        $db1 = (new Injector($db1Module, $_ENV['TMP_DIR']))->getInstance(Connection::class, 'db1');
        $db2 = (new Injector($db2Module, $_ENV['TMP_DIR']))->getInstance(Connection::class, 'db2');
        $db1a = (new Injector($db1Module, $_ENV['TMP_DIR']))->getInstance(Connection::class, 'db1');
        $this->assertInstanceOf(Connection::class, $db1);
        $this->assertNotSame($db1, $db2);
        $this->assertSame($db1, $db1a);
    }
}

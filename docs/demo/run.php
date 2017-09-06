<?php
/**
 * This file is part of the Ray.DbalModule package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use Ray\DbalModule\DbalInject;
use Ray\DbalModule\DbalModule;
use Ray\Di\Injector;

class Fake
{
    use DbalInject;

    public function foo()
    {
        return $this->db;
    }
}

$fake = (new Injector(new DbalModule('driver=pdo_sqlite&memory=true')))->getInstance(Fake::class);
$works = ($fake->foo() instanceof \Doctrine\DBAL\Driver\Connection);

echo($works ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;

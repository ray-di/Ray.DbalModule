<?php

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

use BEAR\DbalModule\DbalInject;
use BEAR\DbalModule\DbalModule;
use Ray\Di\Injector;

class Fake
{
    use DbalInject;

    public function getDb()
    {
        return $this->db;
    }
}

$_ENV['DBAL_CONFIG'] = 'driver=pdo_sqlite&memory=true';
$fake = (new Injector(new DbalModule))->getInstance(Fake::class);
$works = ($fake->getDb() instanceof \Doctrine\DBAL\Driver\Connection);

echo ($works ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;


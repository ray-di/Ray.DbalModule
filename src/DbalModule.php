<?php
/**
 * This file is part of the BEAR.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\DbalModule;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;
use Doctrine\DBAL\Driver\Connection;

class DbalModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(Connection::class)->toProvider(DbalProvider::class)->in(Scope::SINGLETON);
    }
}

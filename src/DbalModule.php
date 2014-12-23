<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Ray\Di\AbstractModule;
use Ray\Di\Scope;
use Doctrine\DBAL\Driver\Connection;

class DbalModule extends AbstractModule
{
    /**
     * @var string
     */
    private $config;

    /**
     * @param string $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind()->annotatedWith('dbal_config')->toInstance($this->config);
        $this->bind(Connection::class)->toProvider(DbalProvider::class)->in(Scope::SINGLETON);
    }
}

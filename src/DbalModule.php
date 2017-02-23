<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\DBAL\Driver\Connection;
use Ray\DbalModule\Annotation\DbalConfig;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

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
        AnnotationRegistry::registerFile(__DIR__ . '/DoctrineAnnotations.php');
        $this->bind()->annotatedWith(DbalConfig::class)->toInstance($this->config);
        $this->bind(Connection::class)->toProvider(DbalProvider::class)->in(Scope::SINGLETON);
    }
}

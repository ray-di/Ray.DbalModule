<?php
/**
 * This file is part of the Ray.DbalModule package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\DbalModule;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\DBAL\Driver\Connection;
use Ray\DbalModule\Annotation\DbalConfig;
use Ray\Di\AbstractModule;
use Ray\Di\Name;
use Ray\Di\Scope;

class DbalModule extends AbstractModule
{
    /**
     * @var string
     */
    private $config;

    /**
     * @var string
     */
    private $qualifier;

    /**
     * @param AbstractModule $config
     * @param string         $qualifier
     */
    public function __construct($config, $qualifier = Name::ANY)
    {
        $this->config = $config;
        $this->qualifier = $qualifier;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        AnnotationRegistry::registerFile(__DIR__ . '/DoctrineAnnotations.php');
        $this->bind()->annotatedWith($this->qualifier)->annotatedWith(DbalConfig::class)->toInstance($this->config);
        $this->bind(Connection::class)->annotatedWith($this->qualifier)->toProvider(DbalProvider::class, $this->qualifier)->in(Scope::SINGLETON);
    }
}

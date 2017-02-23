<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Doctrine\DBAL\DriverManager;
use Ray\DbalModule\Annotation\DbalConfig;
use Ray\Di\Di\PostConstruct;
use Ray\Di\InjectorInterface;
use Ray\Di\ProviderInterface;
use Ray\Di\SetContextInterface;

class DbalProvider implements ProviderInterface, SetContextInterface
{
    /**
     * @var InjectorInterface
     */
    private $injector;

    /**
     * @var string
     */
    private $context;

    /**
     * @var array
     */
    private $config;

    public function __construct(InjectorInterface $injector)
    {
        $this->injector = $injector;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @PostConstruct
     */
    public function init()
    {
        $config = $this->injector->getInstance('', DbalConfig::class . $this->context);
        if (is_array($config)) {
            $this->config = $config;

            return;
        }
        if (is_string($config)) {
            $parsedConfig = [];
            parse_str($config, $parsedConfig);
            $this->config = $parsedConfig;

            return;
        }

        throw new \InvalidArgumentException('@DbalConfig');
    }


    /**
     * {@inheritdoc}
     */
    public function get()
    {
        $conn = DriverManager::getConnection($this->config);

        return $conn;
    }
}

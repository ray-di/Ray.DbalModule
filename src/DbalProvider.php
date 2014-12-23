<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Ray\Di\Di\Named;
use Ray\Di\ProviderInterface;
use Doctrine\DBAL\DriverManager;

class DbalProvider implements ProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * @param array $config
     *
     * @Named("dbal_config")
     */
    public function __construct($config)
    {
        $parsedConfig = [];
        parse_str($config, $parsedConfig);
        $this->config = $parsedConfig;
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

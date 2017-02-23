<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Ray\DbalModule\Annotation\DbalConfig;
use Ray\Di\ProviderInterface;
use Doctrine\DBAL\DriverManager;

class DbalProvider implements ProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * @param string $config
     *
     * @DbalConfig
     */
    public function __construct($config)
    {
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

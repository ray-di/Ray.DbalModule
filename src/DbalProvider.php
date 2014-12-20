<?php
/**
 * This file is part of the BEAR.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\DbalModule;

use Ray\Di\ProviderInterface;
use Doctrine\DBAL\DriverManager;

class DbalProvider implements ProviderInterface
{
    /**
     * @var array
     */
    private $config;

    /**
     * @SuppressWarnings(PHPMD)
     */
    public function __construct()
    {
        $config = [];
        parse_str($_ENV['DBAL_CONFIG'], $config);
        $this->config = $config;
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

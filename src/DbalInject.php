<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule;

use Doctrine\DBAL\Driver\Connection;

trait DbalInject
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * @param Connection $db
     *
     * @\Ray\Di\Di\Inject
     */
    public function setDbalConnection(Connection $db = null)
    {
        $this->db = $db;
    }
}

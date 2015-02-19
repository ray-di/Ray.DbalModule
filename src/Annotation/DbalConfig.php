<?php
/**
 * This file is part of the Ray.DbalModule package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ray\DbalModule\Annotation;

use Ray\Di\Di\Qualifier;

/**
 * @Annotation
 * @Target("METHOD")
 * @Qualifier
 */
final class DbalConfig
{
    public $value;
}

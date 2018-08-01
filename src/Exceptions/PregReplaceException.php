<?php
/**
 * Copyright (c) 2018. Brett Cao.
 *
 * The license can be found in the package and online at https://mit-license.org/.
 *
 * @copyright 2018 Brett Cao
 * @license https://mit-license.org/ MIT License
 * @version 7.0.0 Moddns\BladeExtensions
 */

namespace Moddns\BladeExtensions\Exceptions;

use RuntimeException;

/**
 * {@inheritdoc}
 */
class PregReplaceException extends RuntimeException
{
    /**
     * error method.
     *
     * @param $error
     * @param $class
     *
     * @return static
     */
    public static function error($error, $class)
    {
        return new static("Class [{$class}] preg error [$error]");
    }
}

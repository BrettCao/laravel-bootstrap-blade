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

use Exception;

/**
 * {@inheritdoc}
 */
class InvalidDirectiveClassException extends Exception
{
    /**
     * Shortcut helper method.
     *
     * @param string|object $class The class reference or instance
     *
     * @return InvalidDirectiveClassException
     */
    public static function forClass($class)
    {
        return new static($class);
    }

    /**
     * InvalidDirectiveClassException constructor.
     *
     * @param string          $class
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct($class, $code = 500, \Exception $previous = null)
    {
        $class = is_string($class) ?: get_class($class);
        $message = "The class [{$class}] is not a valid directive. Ensure it extends the [Moddns\\BladeExtensions\\Directive] class";
        parent::__construct($message, $code, $previous);
    }
}

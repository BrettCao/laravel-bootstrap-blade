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

namespace Moddns\BladeExtensions\Contracts;

/**
 * Used for storing instances of helper classes.
 *
 * @author  Brett Cao
 */
interface HelperRepository
{
    /**
     * Put a helper instance in the repository.
     *
     * @param string $key      The accessor key
     * @param object $instance The class instance
     *
     * @return $this
     */
    public function put($key, $instance);

    /**
     * Check if a instance exists in the repository.
     *
     * @param string $key The accessor key
     *
     * @return bool
     */
    public function has($key);

    /**
     * Get a helper instance from the repository.
     *
     * @param     string $key The accessor key
     * @param null $default The
     *
     * @return mixed
     */
    public function get($key, $default = null);
}

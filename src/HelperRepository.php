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

namespace Moddns\BladeExtensions;

/**
 * {@inheritdoc}
 */
class HelperRepository implements Contracts\HelperRepository
{
    /**
     * @var array|\ArrayObject<string,object>
     */
    protected $helpers;

    /**
     * HelperRepository constructor.
     */
    public function __construct()
    {
        $this->helpers = [];
    }

    /**
     * {@inheritdoc}
     */
    public function put($key, $instance)
    {
        $this->helpers[ $key ] = $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return isset($this->helpers[ $key ]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $default = null)
    {
        return $this->has($key) ? $this->helpers[ $key ] : $default;
    }
}

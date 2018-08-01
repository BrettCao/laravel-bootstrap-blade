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

namespace Moddns\BladeExtensions\Helpers\Embed;

use Moddns\BladeExtensions\Helpers\Embed;
use Moddns\BladeExtensions\Helpers\Stacker;

/**
 * Manages the Loop instances.
 *
 * @version        2.1.0
 * @author         Brett Cao
 * @license        MIT License - http://Moddns.mit-license.org
 * @copyright      (2011-2014, Brett Cao - Moddns Technologies
 * @link           http://robin.Moddns.nl/blade-extensions
 */
class EmbedHelper extends Stacker
{
    /**
     * create.
     *
     * @param array $args
     *
     * @return \Moddns\BladeExtensions\Helpers\Embed\EmbedStack
     */
    protected function create($args = [])
    {
        $viewPath = $args[0];
        $vars = isset($args[1]) ? $args[1] : [];
        $embed = $this->getContainer()->make(Embed\EmbedStack::class, compact('viewPath', 'vars'));

        return $embed;
    }
}

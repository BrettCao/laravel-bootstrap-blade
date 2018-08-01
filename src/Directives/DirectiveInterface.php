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

namespace Moddns\BladeExtensions\Directives;

/**
 * Interface DirectiveInterface.
 *
 * @author  Brett Cao
 */
interface DirectiveInterface
{
    /**
     * Checks if the directive is compatible with the current Laravel version.
     *
     * @return bool
     */
    public static function isCompatible();

    /**
     * handle method.
     *
     * @param $value
     *
     * @return mixed
     */
    public function handle($value);

    /**
     * @return string
     */
    public function getPattern();

    /**
     * Set the pattern value.
     *
     * @param string $pattern
     *
     * @return AbstractDirective
     */
    public function setPattern($pattern);

    /**
     * @return string
     */
    public function getReplace();

    /**
     * Set the replace value.
     *
     * @param string $replace
     *
     * @return AbstractDirective
     */
    public function setReplace($replace);

    /**
     * @return string
     */
    public function getName();

    /**
     * Set the name value.
     *
     * @param string $name
     *
     * @return AbstractDirective
     */
    public function setName($name);
}

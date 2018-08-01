<?php
/**
 * Copyright (c) 2018. Brett Cao.
 *
 * The license can be found in the package and online at https://mit-license.org/.
 *
 * @copyright 2018 Brett Cao
 * @license https://mit-license.org/ MIT License
 * @version 7.0.0
 */

namespace Moddns\BladeExtensions\Directives;

class MacrodefAbstractDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\w)(\s*)@macrodef(?:\s*)\((?:\s*)[\'"]([\w\d]*)[\'"](?:,|)(.*)\)/';

    protected $replace = '$1<?php app("blade.helpers")->macro("$2", function($3){ ?>';
}

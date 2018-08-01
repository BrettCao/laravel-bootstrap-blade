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
 * This is the class EndminifyDirective.
 *
 * @author  Brett Cao
 */
class EndminifyDirective extends AbstractDirective
{
    protected $replace = <<<'EOT'
$1<?php echo app("blade-extensions.helpers")->get('minifier')->close(); ?>
EOT;
}

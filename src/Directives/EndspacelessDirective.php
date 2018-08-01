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
 * This is the class EndspacelessDirective.
 *
 * @author  Brett Cao
 */
class EndspacelessDirective extends AbstractDirective
{
    protected $replace = '<?php echo preg_replace(\'/>\\s+</\', \'><\', ob_get_clean()); ?>';
}

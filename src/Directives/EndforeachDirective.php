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
 * This is the class EndforeachDirective.
 *
 * @author  Brett Cao
 */
class EndforeachDirective extends AbstractDirective
{
    public static $compatibility = '5.0.*|5.1.*|5.2.*';

    protected $replace = <<<'EOT'
$1<?php
app('blade-extensions.helpers')->get('loop')->looped();
endforeach;
app('blade-extensions.helpers')->get('loop')->endLoop($loop);
?>$2
EOT;
}

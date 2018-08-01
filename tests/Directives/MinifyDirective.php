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

class MinifyAbstractDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\\w)(\\s*)@minify(\\s*\\(.*\\))/';

    protected $replace = <<<'EOT'
$1<?php echo app("blade.helpers")->get('minifier')->open$2; ?>
EOT;
}

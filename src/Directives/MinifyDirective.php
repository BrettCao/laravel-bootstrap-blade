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

use Moddns\BladeExtensions\Contracts\HelperRepository;
use Moddns\BladeExtensions\Helpers\Minifier\MinifierHelper;

/**
 * This is the class MinifyDirective.
 *
 * @author  Brett Cao
 */
class MinifyDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\\w)(\\s*)@NAME(\\s*\\(.*\\))/';

    protected $replace = <<<'EOT'
$1<?php echo app("blade-extensions.helpers")->get('minifier')->open$2; ?>
EOT;

    /**
     * MinifyDirective constructor.
     */
    public function __construct(HelperRepository $helpers)
    {
        $helpers->put('minifier', new MinifierHelper);
    }
}

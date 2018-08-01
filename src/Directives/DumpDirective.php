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

/**
 * This is the class DumpDirective.
 *
 * @author  Brett Cao
 */
class DumpDirective extends AbstractDirective
{
    protected $pattern = self::OPEN_MATCHER;

    protected $replace = <<<'EOT'
    $1<?php 
    app('blade-extensions.helpers')
        ->get('dump')
        ->setPath(isset($__path) ? $__path : null)
        ->setEnv($__env)
        ->setVars(array_except(get_defined_vars(), ['__data', '__path']))        
        ->dump$2 
    ?>$3
EOT;

    /**
     * DumpDirective constructor.
     */
    public function __construct(HelperRepository $helpers)
    {
        $helpers->put('dump', new \Moddns\BladeExtensions\Helpers\DumpHelper());
    }
}

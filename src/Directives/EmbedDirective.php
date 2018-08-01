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

use Illuminate\Contracts\Container\Container;
use Moddns\BladeExtensions\Contracts\HelperRepository;

/**
 * This is the class EmbedDirective.
 *
 * @author  Brett Cao
 */
class EmbedDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\\w)(\\s*)@NAME\\s*\\((.*?)\\)\\s*$((?>(?!@(?:end)?NAME).|(?0))*)@endNAME/sm';

    protected $replace = <<<'EOT'
$1<?php app('blade-extensions.helpers')->get('embed')->start($2); ?>
$1<?php app('blade-extensions.helpers')->get('embed')->current()->setData(\$__data)->setContent(<<<'EOT_'
$3
EOT_
); ?>
$1<?php app('blade-extensions.helpers')->get('embed')->end(); ?>
EOT;

    /**
     * DumpDirective constructor.
     */
    public function __construct(HelperRepository $helpers, Container $container)
    {
        $helpers->put('embed', $container->make(\Moddns\BladeExtensions\Helpers\Embed\EmbedHelper::class));
    }
}

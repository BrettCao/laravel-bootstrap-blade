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
 * This is the class ForeachDirective.
 *
 * @author  Brett Cao
 */
class ForeachDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\w)(\s*)@foreach(?:\s*)\(([\w\W]*?)(?:\sas)(.*)\)/';

    protected $replace = <<<'EOT'
$1<?php
app('blade-extensions.helpers')->get('loop')->newLoop($2);
foreach(app('blade-extensions.helpers')->get('loop')->getLastStack()->getItems() as $3):
    $loop = app('blade-extensions.helpers')->get('loop')->loop();
?>
EOT;

    /**
     * DumpDirective constructor.
     */
    public function __construct(HelperRepository $helpers)
    {
        $helpers->put('loop', new \Moddns\BladeExtensions\Helpers\Loop\LoopHelper());
    }
}

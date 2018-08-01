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
use Moddns\BladeExtensions\Helpers\Markdown\MarkdownHelper;
use Moddns\BladeExtensions\Helpers\Markdown\MarkdownParserInterface;

/**
 * This is the class MarkdownDirective.
 *
 * @author  Brett Cao
 */
class MarkdownDirective extends AbstractDirective
{
    protected $pattern = '/(?<!\w)(\s*)@NAME(?!\()(\s*)/';

    protected $replace = <<<'EOT'
$1<?php echo app("blade-extensions.helpers")->get('markdown')->parse(<<<'EOT'$2
EOT;

    /**
     * MarkdownDirective constructor.
     *
     * @param \Moddns\BladeExtensions\Contracts\HelperRepository               $helpers
     * @param \Moddns\BladeExtensions\Helpers\Markdown\MarkdownParserInterface $markdown
     */
    public function __construct(HelperRepository $helpers, MarkdownParserInterface $markdown)
    {
        $helpers->put('markdown', $helper = new MarkdownHelper());
        $helper->setParser($markdown);
    }
}

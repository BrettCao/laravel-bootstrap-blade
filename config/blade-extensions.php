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

return [
    'directives'        => [
        'set'   => 'Moddns\\BladeExtensions\\Directives\\SetDirective',
        'unset' => 'Moddns\\BladeExtensions\\Directives\\UnsetDirective',

        'breakpoint' => 'Moddns\\BladeExtensions\\Directives\\BreakpointDirective',
        'dump'       => 'Moddns\\BladeExtensions\\Directives\\DumpDirective',

        'foreach'    => 'Moddns\\BladeExtensions\\Directives\\ForeachDirective',
        'endforeach' => 'Moddns\\BladeExtensions\\Directives\\EndforeachDirective',
        'break'      => 'Moddns\\BladeExtensions\\Directives\\BreakDirective',
        'continue'   => 'Moddns\\BladeExtensions\\Directives\\ContinueDirective',

        'embed' => 'Moddns\\BladeExtensions\\Directives\\EmbedDirective'

//        'closure' => function ($value) {
//            return $value;
//        },

    ],
    // `optional` directives are only used for **unit-testing**
    // If you want to use any of the `optional` directives, you have to **manually copy/paste** them to `directives`.
    'optional'          => [
        'macro'    => 'Moddns\\BladeExtensions\\Directives\\MacroDirective',
        'endmacro' => 'Moddns\\BladeExtensions\\Directives\\EndmacroDirective',
        'macrodef' => 'Moddns\\BladeExtensions\\Directives\\MacrodefDirective',

        'markdown'    => 'Moddns\\BladeExtensions\\Directives\\MarkdownDirective',
        'endmarkdown' => 'Moddns\\BladeExtensions\\Directives\\EndmarkdownDirective',

        'minify'    => 'Moddns\\BladeExtensions\\Directives\\MinifyDirective',
        'endminify' => 'Moddns\\BladeExtensions\\Directives\\EndminifyDirective',

        'spaceless'    => 'Moddns\\BladeExtensions\\Directives\\SpacelessDirective',
        'endspaceless' => 'Moddns\\BladeExtensions\\Directives\\EndspacelessDirective',

        'ifsection'     => 'Moddns\\BladeExtensions\\Directives\\IfSectionDirective',
        'elseifsection' => 'Moddns\\BladeExtensions\\Directives\\ElseIfSectionDirective',
        'endifsection'  => 'Moddns\\BladeExtensions\\Directives\\EndIfSectionDirective',
    ],
    'version_overrides' => [

        // 5.2 introduced @break and @continue
        // but blade-extensions's @foreach relies on them so we don't yet disable them
        // 5.3 introduced the loop variable for the @foreach directive. we can disable these.
        // NOTE: If you have used blade-extensions's @foreach before blade-extensions:7.0.0, you probably want to remove this
        // TL:DR: upgrading to blade-extension 7.0.0? then remove this
        '>=5.3' => [
            'break'      => null,
            'continue'   => null,
            'foreach'    => null,
            'endforeach' => null,
        ],
    ],
];

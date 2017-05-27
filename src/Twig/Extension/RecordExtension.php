<?php

namespace Bolt\Twig\Extension;

use Bolt\Twig\Runtime;
use Twig_Extension as Extension;
use Twig_Filter as TwigFilter;
use Twig_Function as TwigFunction;

/**
 * Content record functionality Twig extension.
 *
 * @internal
 *
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class RecordExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $safe = ['is_safe' => ['html']];
        $env  = ['needs_environment' => true];

        return [
            // @codingStandardsIgnoreStart
            new TwigFunction('current',       [Runtime\RecordRuntime::class, 'current']),
            new TwigFunction('excerpt',       [Runtime\RecordRuntime::class, 'excerpt'], $safe),
            new TwigFunction('fields',        [Runtime\RecordRuntime::class, 'fields'], $env + $safe),
            new TwigFunction('listtemplates', [Runtime\RecordRuntime::class, 'listTemplates']),
            new TwigFunction('pager',         [Runtime\RecordRuntime::class, 'pager'], $env + $safe),
            // @codingStandardsIgnoreEnd
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        $safe = ['is_safe' => ['html']];

        return [
            // @codingStandardsIgnoreStart
            new TwigFilter('current',     [Runtime\RecordRuntime::class, 'current']),
            new TwigFilter('excerpt',     [Runtime\RecordRuntime::class, 'excerpt'], $safe),
            new TwigFilter('selectfield', [Runtime\RecordRuntime::class, 'selectField']),
            // @codingStandardsIgnoreEnd
        ];
    }
}

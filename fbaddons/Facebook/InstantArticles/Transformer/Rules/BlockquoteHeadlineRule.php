<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 */
namespace Facebook\InstantArticles\Transformer\Rules;

use Facebook\InstantArticles\Elements\Blockquote;
use Facebook\InstantArticles\Elements\Bold;
use Facebook\InstantArticles\Elements\LineBreak;
use Facebook\InstantArticles\Transformer\Getters\GetterFactory;
use Facebook\InstantArticles\Transformer\Getters\StringGetter;
use Facebook\InstantArticles\Transformer\Getters\ChildrenGetter;

class BlockquoteHeadlineRule extends ConfigurationSelectorRule
{
    public function __construct()
    {
    }

    public function getContextClass()
    {
        return $this->contextClass = Blockquote::getClassName();
    }

    public static function create()
    {
        return new BlockquoteHeadlineRule();
    }

    public static function createFrom($configuration)
    {
        return self::create()->withSelector($configuration['selector']);
    }

    public function apply($transformer, $text_container, $element)
    {
        $bold = Bold::create();
        $text_container->appendText($bold);
        $transformer->transform($bold, $element);
	$line_break = LineBreak::create();
        $line_break2 = LineBreak::create();
        $text_container->appendText($line_break);
        $text_container->appendText($line_break2);
        return $text_container;
    }
}

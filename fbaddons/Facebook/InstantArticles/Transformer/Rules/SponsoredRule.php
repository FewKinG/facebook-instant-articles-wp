<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 */
namespace Facebook\InstantArticles\Transformer\Rules;

use Facebook\InstantArticles\Elements\Italic;
use Facebook\InstantArticles\Elements\LineBreak;
use Facebook\InstantArticles\Elements\Paragraph;
use Facebook\InstantArticles\Elements\Footer;
use Facebook\InstantArticles\Transformer\Getters\GetterFactory;
use Facebook\InstantArticles\Transformer\Getters\StringGetter;
use Facebook\InstantArticles\Transformer\Getters\ChildrenGetter;

class SponsoredRule extends ConfigurationSelectorRule
{
    public function __construct()
    {
    }

    public static function create()
    {
        return new SponsoredRule();
    }

    public static function createFrom($configuration)
    {
        return self::create()->withSelector($configuration['selector']);
    }

    public function getContextClass()
    {
        return $this->contextClass = Footer::getClassName();
    }

    public function apply($transformer, $footer, $element)
    {
	$paragraph = Paragraph::create();
        $italic = Italic::create();
        $paragraph->appendText($italic);
	$italic->appendText('Dieser Beitrag wurde gesponsert.');
	$line_break = LineBreak::create();
        $line_break2 = LineBreak::create();
        $paragraph->appendText($line_break);
        $paragraph->appendText($line_break2);	
	$footer->addCredit($paragraph);
	return $footer;
    }

    public function loadFrom($configuration)
    {
        $this->selector = $configuration['selector'];
    }
}

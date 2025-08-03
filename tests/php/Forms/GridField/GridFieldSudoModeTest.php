<?php

namespace SilverStripe\Forms\Tests\GridField;

use RuntimeException;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldSudoMode;
use SilverStripe\Forms\Form;
use SilverStripe\Control\RequestHandler;
use SilverStripe\Security\Group;

class GridFieldSudoModeTest extends SapphireTest
{
    public function testRenderedHtml(): void
    {
        $html = $this->getRenderedHtml();
        $strings = [
            'type="password"',
            "name=\"SudoModePasswordField-[a-z0-9]+\"",
            'autocomplete="off"',
            'data-initially-collapsed="data-initially-collapsed"',
            'data-for-gridfield="data-for-gridfield"',
            'data-section-title="My section title"',
        ];
        foreach ($strings as $string) {
            $rx = "#<input[^<]+$string#";
            $this->assertTrue((bool) preg_match($rx, $html), $string);
        }
    }

    private function getRenderedHtml(): string
    {
        $form = new Form(new RequestHandler());
        $gridField = new GridField('test', 'test', Group::get());
        $gridField->setReadonly(true);
        $gridField->setForm($form);
        $component = new GridFieldSudoMode('My section title', 3);
        return $component->getHTMLFragments($gridField)['header'];
    }
}

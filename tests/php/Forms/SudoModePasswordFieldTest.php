<?php

namespace SilverStripe\Forms\Tests;

use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\SudoModePasswordField;

class SudoModePasswordFieldTest extends SapphireTest
{
    public function testGettersSettersAndAttributes()
    {
        $field = new SudoModePasswordField('WillBeOverwritten');
        preg_match('#-([a-z0-9]+)$#', $field->getName(), $matches);
        $uniqueId = $matches[1];
        $this->assertSame(false, $field->getInitiallyCollapsed());
        $this->assertSame(false, $field->getForGridField());
        $this->assertSame('', $field->getSectionTitle());
        $this->assertFieldAttributes($field, [
            'name' => SudoModePasswordField::FIELD_NAME . "-$uniqueId",
            'data-initially-collapsed' => false,
            'data-for-gridfield' => false,
            'data-section-title' => '',
        ]);
        $field->setInitiallyCollapsed(true);
        $field->setForGridField(true);
        $field->setSectionTitle('lorem');
        $this->assertSame(true, $field->getInitiallyCollapsed());
        $this->assertSame(true, $field->getForGridField());
        $this->assertSame('lorem', $field->getSectionTitle());
        $this->assertFieldAttributes($field, [
            'name' => SudoModePasswordField::FIELD_NAME . "-$uniqueId",
            'data-initially-collapsed' => true,
            'data-for-gridfield' => true,
            'data-section-title' => 'lorem',
        ]);
    }

    /**
     * Used to test a subset of attributes as things like 'disabled' and 'readonly' are not applicable
     */
    private function assertFieldAttributes(SudoModePasswordField $field, array $expected)
    {
        $keys = array_keys($expected);
        $actual = array_filter($field->getAttributes(), fn($key) => in_array($key, $keys), ARRAY_FILTER_USE_KEY);
        $this->assertSame($expected, $actual);
    }
}

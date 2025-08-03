<?php

namespace SilverStripe\Forms\Tests\GridField\GridFieldTest;

use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class RequiresSudoMode extends DataObject implements TestOnly
{
    private static $table_name = 'GridFieldTest_Protected';

    private static $db = [
        'Name' => 'Varchar',
    ];

    private static bool $require_sudo_mode = true;
}

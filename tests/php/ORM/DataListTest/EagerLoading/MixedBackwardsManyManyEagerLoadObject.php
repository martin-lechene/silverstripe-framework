<?php

namespace SilverStripe\ORM\Tests\DataListTest\EagerLoading;

use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\TestOnly;

class MixedBackwardsManyManyEagerLoadObject extends DataObject implements TestOnly
{
    // Table names become too long when using class name
    private static $table_name = 'MixedBackManyManyEagerLoad';

    private static $db = [
        'Title' => 'Varchar'
    ];
}

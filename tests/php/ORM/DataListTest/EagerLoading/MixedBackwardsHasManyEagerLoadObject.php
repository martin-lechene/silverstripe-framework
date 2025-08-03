<?php

namespace SilverStripe\ORM\Tests\DataListTest\EagerLoading;

use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\TestOnly;

class MixedBackwardsHasManyEagerLoadObject extends DataObject implements TestOnly
{
    // Table names become too long when using class name
    private static $table_name = 'MixedBackHasManyEagerLoad';

    private static $db = [
        'Title' => 'Varchar'
    ];

    private static $has_one = [
        'MixedBackwardsHasOneEagerLoadObject' => MixedBackwardsHasOneEagerLoadObject::class
    ];


    private static $many_many = [
        'MixedBackwardsManyManyEagerLoadObjects' => MixedBackwardsManyManyEagerLoadObject::class
    ];
}

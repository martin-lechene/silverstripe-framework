<?php

namespace SilverStripe\ORM\Tests\DataListTest\EagerLoading;

use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\TestOnly;

class MixedBackwardsHasOneEagerLoadObject extends DataObject implements TestOnly
{
    private static $table_name = 'MixedBackwardsHasOneEagerLoadObject';

    private static $db = [
        'Title' => 'Varchar'
    ];

    private static $has_many = [
        'MixedBackwardsHasManyEagerLoadObjects' => MixedBackwardsHasManyEagerLoadObject::class
    ];
}

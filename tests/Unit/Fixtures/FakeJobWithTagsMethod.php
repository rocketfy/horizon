<?php

namespace Rocketfy\Horizon\Tests\Unit\Fixtures;

class FakeJobWithTagsMethod
{
    public function tags()
    {
        return [
            'first',
            'second',
        ];
    }
}

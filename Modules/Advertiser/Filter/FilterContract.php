<?php

namespace Modules\Advertiser\Filter;

interface FilterContract
{
    public function handle($value): void;
}

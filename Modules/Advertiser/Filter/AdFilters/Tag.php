<?php

namespace Modules\Advertiser\Filter\AdFilters;

use Modules\Advertiser\Filter\FilterContract;

class Tag implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->whereHas('tags', function ($q) use ($value) {
            return $q->whereIn('tag_id', $value);
        });
    }
}

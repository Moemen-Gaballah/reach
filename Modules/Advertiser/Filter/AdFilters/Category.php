<?php

namespace Modules\Advertiser\Filter\AdFilters;

use Modules\Advertiser\Filter\FilterContract;

class Category implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('category_id', $value);
    }
}

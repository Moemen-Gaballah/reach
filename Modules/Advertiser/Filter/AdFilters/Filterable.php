<?php

namespace Modules\Advertiser\Filter\AdFilters;

use Modules\Advertiser\Filter\FilterBuilder;

trait Filterable
{
    public function scopeFilterBy($query, $filters)
    {
        $namespace = 'Modules\Advertiser\Filter\AdFilters';
        $filter = new FilterBuilder($query, $filters, $namespace);

        return $filter->apply();
    }
}

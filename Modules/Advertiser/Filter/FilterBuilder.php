<?php

namespace Modules\Advertiser\Filter;

use function PHPUnit\Framework\isEmpty;

class FilterBuilder
{
    protected $query;
    protected $filters;
    protected $namespace;

    public function __construct($query, $filters, $namespace)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->namespace = $namespace;
    }

    public function apply()
    {
        foreach ($this->filters as $name => $value) {
            $normailizedName = ucfirst($name);
            $class = $this->namespace . "\\{$normailizedName}";

            if (! class_exists($class)) {
                continue;
            }

//            if ((!is_array($value) && strlen($value)) || (is_array($value) && !isEmpty($value))) {
            if (is_array($value) || strlen($value)) {
                (new $class($this->query))->handle($value);
            } else {
                (new $class($this->query))->handle();
            }
        }

        return $this->query;
    }
}

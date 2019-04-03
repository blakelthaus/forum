<?php

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $builder;
    protected $request;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        if ($this->request->has('by')) {
            $this->by($this->request->by);
        }

        return $this->builder;
    }

    public function getFilters()
    {
        $filters = array_intersect(array_keys($this->request->all()), $this->filters);
        return $this->request->only($filters);
    }

    /**
     * @param $filter
     * @return bool
     */
    public function hasFilter($filter)
    {
        return method_exists($this, $filter) && $this->request->has($filter);
    }
}

<?php
namespace App\Filters;

use Illuminate\Http\Request;
// Класс фильтра
class QueryFilter {
    protected $request;
    protected $queryBuilder;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function apply($queryBuilder) {
        $this->queryBuilder = $queryBuilder;

        foreach ($this->request->all() as $filterName => $value) {

            if (method_exists($this, $filterName)) {
                $this->{$filterName}($value);
            }
        }

        return $this->queryBuilder;
    }

}


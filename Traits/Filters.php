<?php
namespace App\Traits;

use App\Filters\QueryFilter;

trait Filters {
    public function scopeFilter($query, QueryFilter $filters) {

        return $filters->apply($query);
    }
}

<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

/**
 */
class BaseModel extends Model
{
    public function scopeFilter($query, QueryFilter $filters) {

        return $filters->apply($query);
    }

}

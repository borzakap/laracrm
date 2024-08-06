<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\BaseFilter;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param QueryFilter $filter
     */
    public function scopeFilter(Builder $builder, BaseFilter $filter) 
    {
        $filter->apply($builder);
    }
}

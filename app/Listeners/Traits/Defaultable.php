<?php

namespace App\Listeners\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait Defaultable
{
    public function findDefault(Collection $collection, Model $current){
        // if not deleted
        if ($collection->contains($current)) {
            $default = $current->default ? $current->id 
                    : ($collection->where('default', true)?->first()?->id 
                    ?: $collection->first()->id);
        // if deleted
        } else {
            $default = $collection?->where('default', true)?->first()?->id 
                    ?: $collection?->first()?->id;
        }
        return $default;
    }
}

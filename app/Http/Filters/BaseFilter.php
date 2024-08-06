<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class BaseFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var int
     */
    public $perPage;

    /**
     * Create a new class instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        
        $filters = $this->request->input('filters');
        
        if ($filters) {
            foreach ($filters as $field => $value) {
                $method = Str::camel($field);
                if (method_exists($this, $method) && !empty($value)) {
                    call_user_func_array([$this, $method], (array) $value);
                }
            }
        }
        
        $sort = $this->request->input('sort', ['field' => null, 'option' => 'desc']);
        
        if (method_exists($this, 'sort')) {
            call_user_func_array([$this, 'sort'], (array) $sort);
        }
        
        $this->perPage = $this->request->input('perPage');
    }
}

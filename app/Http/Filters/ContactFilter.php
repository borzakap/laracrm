<?php

namespace App\Http\Filters;

use App\Http\Filters\BaseFilter;
use Illuminate\Database\Eloquent\Builder;

/**
 * @OA\Schema(
 *      schema="ContactFilter",
 *      type="object",
 *      description="Filters & sorting for contacts list",
 *      @OA\Property(
 *          property="filters",
 *          @OA\Property(
 *              property="source",
 *              type="string",
 *              example="stirng",
 *          )
 *      ),
 *      @OA\Property(
 *          property="sort",
 *          @OA\Property(
 *              property="field",
 *              type="string",
 *              example="stirng",
 *          ),
 *          @OA\Property(
 *              property="option",
 *              type="string",
 *              example="stirng",
 *          )
 *      )
 * )
 */
class ContactFilter extends BaseFilter
{

    
        
}

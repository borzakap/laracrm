<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
    
        /**
     * @OA\Schema(
     *   schema="paginationInformation",
     *   type="object",
     *   description="pagination structure",
     *   @OA\Property(
     *      property="currentPage",
     *      type="integer",
     *      example="1",
     *   ),
     *   @OA\Property(
     *      property="from",
     *      type="integer",
     *      example="1",
     *   ),
     *   @OA\Property(
     *      property="to",
     *      type="integer",
     *      example="10",
     *   ),
     *   @OA\Property(
     *      property="perPage",
     *      type="integer",
     *      example="15",
     *   ),
     *   @OA\Property(
     *      property="total",
     *      type="integer",
     *      example="150",
     *   ),
     * )
     */
    public function paginationInformation($request, $paginated, $default): array
    {
        return [
            'meta' => [
                'currentPage' => $paginated['current_page'],
                'from' => $paginated['from'],
                'to' => $paginated['to'],
                'perPage' => $paginated['per_page'],
                'total' => $paginated['total'],
            ]
        ];
    }
}

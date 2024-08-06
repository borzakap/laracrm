<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EmailCollection extends ResourceCollection
{
    /**
     * @OA\Response(
     *      response="EmailCollection",
     *      description="Return emails collection",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  ref="#components/schemas/EmailResource",
     *              ),
     *          )
     *      )
     * )
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}

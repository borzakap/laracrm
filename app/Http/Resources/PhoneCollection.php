<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PhoneCollection extends ResourceCollection
{
    /**
     * @OA\Response(
     *      response="PhoneCollection",
     *      description="Return phones collection",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  ref="#components/schemas/PhoneResource",
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

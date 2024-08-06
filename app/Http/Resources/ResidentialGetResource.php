<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SectionResource;

class ResidentialGetResource extends JsonResource
{
    /**
     * @OA\Response(
     *      response="ResidentialGetResource",
     *      description="Get residential`s data",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              @OA\Property(
     *                  property="id",
     *                  type="integer",
     *                  example="1",
     *              ),
     *              @OA\Property(
     *                  property="name",
     *                  type="string",
     *                  example="Residential Name",
     *              ),
     *              @OA\Property(
     *                  property="sections",
     *                  type="array",
     *                  @OA\Items(
     *                      ref="#components/schemas/SectionResource",
     *                  ),
     *              ),
     *          )
     *      )
     * )
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sections' => SectionResource::collection($this->sections),
        ];
    }
}

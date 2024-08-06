<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * @OA\Schema(
     *      schema="SectionResource",
     *      type="object",
     *      description="Section resource",
     *      @OA\Property(
     *          property="id",
     *          type="integer",
     *          example="1",
     *      ),
     *      @OA\Property(
     *          property="name",
     *          type="string",
     *          example="Section Name",
     *      ),
     * )
     *
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}

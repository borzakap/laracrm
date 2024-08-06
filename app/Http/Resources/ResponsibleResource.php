<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponsibleResource extends JsonResource
{
    /**
     * @OA\Schema(
     *      schema="ResponsibleResource",
     *      type="object",
     *      description="Responsible Resource",
     *      @OA\Property(
     *          property="id",
     *          type="integer",
     *          example="1",
     *      ),
     *      @OA\Property(
     *          property="name",
     *          type="string",
     *          example="Responsible Name",
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

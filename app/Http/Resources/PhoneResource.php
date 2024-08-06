<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
{
    /**
     * @OA\Schema(
     *      schema="PhoneResource",
     *      type="object",
     *      description="Phones collection",
     *      @OA\Property(
     *          property="id",
     *          type="integer",
     *          example="1",
     *      ),
     *      @OA\Property(
     *          property="phone",
     *          type="string",
     *          example="+290489874038",
     *      ),
     *      @OA\Property(
     *          property="default",
     *          type="boolean",
     *          example="true",
     *      ),
     * )
     *
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'default' => $this->default,
        ];
    }
}
